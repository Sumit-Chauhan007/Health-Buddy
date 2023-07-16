<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\Starting;
use App\Models\UserContactDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function adminProfile()
    {
        $user = Auth::User();
        $name = explode(' ',$user->name);
        $firstName = $name['0'];
        if(isset($name[1])) {
            $lastName = $name[1];
        } else {
            $lastName = '';
        }
        return view('admin.profile', compact('firstName', 'lastName'));
    }

    public function adminProfileUpdate(Request $request)
    {
        $id = Auth::User()->id;
        $validated = $request->validate([
            'firstName' => 'required|regex:/^[a-zA-Z0-9\s]+$/|min:3|max:30',
            'lastName' => 'required|regex:/^[a-zA-Z0-9\s]+$/|min:3|max:30',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'phone' => 'min:10|max:10|regex:/[0-9]/|unique:users,phone,'.$id,
            // 'password' => 'required|string|min:8|confirmed',
            'image' => 'mimes:jpeg,jpg,png|max:500'
        ]);
        $data = User::find($id);
        $password = $request->password;
        if($password){
            $data->password = Hash::make($password);
        }
        $image = $request->image;
        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move('assets/images/users',$imagename);
            $data->profile_photo_path = $imagename;
            }
        $data->name = $request->firstName.' '.$request->lastName;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->save();
        return redirect()->back()->with("success", "Profile Updated Successfully");
    }
    public function starting(){
        $blog = Starting::first();
        return view('admin.starting.start',compact('blog'));
    }
    public function addBlog(){
        return view('admin.starting.addBlog');
    }
    public function addNewStartingBlog(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'heading' => 'required|min:3|max:50',
            'description' => 'required|string|max:1000',
            'image' => 'required|mimes:png|max:2000'
        ]);
        if ($validator->passes()) {
            $blog = Starting::first();
            if($blog){
               $data = Starting::first();
            }
            else{
                $data = new Starting();
                $data->blog_uuid = Str::uuid();
            }
            $image = $request->image;
            if ($image) {
                $imagename = time().'.'.$image->getClientOriginalExtension();
                $image->move('assets/images/starting',$imagename);
                $data->image = $imagename;
                }
            $data->description = $request->description;
            $data->heading = $request->heading;
            $save = $data->save();
            if($save){
                return response()->json(['success'=>'starting']);
            }
        }
        // return response()->json($validator->errors());
        return response()->json(['error'=>$validator->errors()]);

    }
    public function ContactedUser(){
        $details = UserContactDetail::orderBy('created_at','desc')->get();
        return view('admin.contactUser',compact('details'));
        }
        public function ExportDetail(){
            return Excel::download(new UsersExport, 'users.csv');
        }
}
