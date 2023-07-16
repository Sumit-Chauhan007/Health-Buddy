<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function users()
    {
        $users = User::select('*')->where('role', '0')->get();
        return view('admin.users', compact('users'));
    }

    public function addUser()
    {
        return view('admin.addUser');
    }

    public function addNewUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z ]*$/|min:3|max:30',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'min:10|max:10|regex:/[0-9]/|unique:users',
            'password' => 'string|min:8',
            'image' => 'mimes:jpeg,jpg,png|max:500'
        ]);
        if ($validator->passes()) {
            $data = new User;
            $image = $request->image;
            if ($image) {           
                $imagename = time().'.'.$image->getClientOriginalExtension();
                $image->move('assets/images/users',$imagename);
                $data->profile_photo_path = $imagename;
                }
            $phone = $request->phone;   
            if($phone){
                $data->phone = $phone;
            }
            $data->uuid = Str::uuid();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = Hash::make('12345678');
            $save = $data->save();
            if($save){
                return response()->json(['success'=>'users']);
            }
        } 
        // return response()->json($validator->errors());
        return response()->json(['error'=>$validator->errors()]);      
               
    }

    public function deleteUser($uuid)
    {
        $id = User::where('uuid', $uuid)->pluck('id');
        $user = User::find($id[0]);
        $user->delete();
        return redirect()->back()->with("success", "User Deleted Successfully");
    }

    public function editUser($id)
    {
        $user = User::where('uuid', $id)->get();
        return view('admin.editUser', compact('user'));
    }

    public function updateUser(Request $request)
    {
        $id = $request->user_id;        
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z ]*$/|min:3|max:30',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'phone' => 'min:10|max:10|regex:/[0-9]/|unique:users,phone,'.$id,
            'password' => 'string|min:8',
            'image' => 'mimes:jpeg,jpg,png|max:500'
        ]);
        if ($validator->passes()) {
            $data = User::find($id);
            $image = $request->image;
            if ($image) {           
                $imagename = time().'.'.$image->getClientOriginalExtension();
                $image->move('assets/images/users',$imagename);
                $data->profile_photo_path = $imagename;
                }
            $phone = $request->phone;   
            if($phone){
                $data->phone = $phone;
            }
            $data->name = $request->name;
            $data->email = $request->email;
            $save = $data->save();
            if($save){
                return response()->json(['success'=>'Added new records.']);
                // return redirect('users')->with("success", "User Updated Successfully");   
            }
        }     
        return response()->json(['error'=>$validator->errors()]);  
    }

    public function actUser($uuid)
    {
        $id = User::where('uuid', $uuid)->pluck('id');
        $data = User::where('id', $id[0])
        ->update([
            'status' => 'active'
        ]);
        return redirect()->back()->with("success", "User Activated Successfully");    
    }

    public function deactUser($uuid)
    {
        $id = User::where('uuid', $uuid)->pluck('id');
        $data = User::where('id', $id[0])
        ->update([
            'status' => 'in-active'
        ]);
        return redirect()->back()->with("success", "User De-Activated Successfully");
    }
    
}
