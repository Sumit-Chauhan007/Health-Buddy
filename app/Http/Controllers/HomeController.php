<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\AbcBlog;
use App\Models\ContactUsBlog;
use App\Models\ContactUse;
use App\Models\FirstBlog;
use App\Models\MedicalServices;
use App\Models\Starting;
use App\Models\TeamBlog;
use App\Models\Testimonial;
use App\Models\UserContactDetail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            return redirect('redirect');
        }
        $MedicalBlogs = MedicalServices::where('status', 'Active')->orderBy('created_at', 'desc')->get();
        $AbcBlog = AbcBlog::where('status', 'active')->first();
        $ContactUs = ContactUsBlog::where('status', 'active')->first();
        $teams = TeamBlog::where('status', 'Active')->orderBy('created_at', 'desc')->get();
        $testimonials = Testimonial::where('status', 'Active')->orderBy('created_at', 'desc')->get();
        $first = FirstBlog::first();
        $Starting = Starting::first();
        return view('frontend.home', compact('Starting', 'first', 'MedicalBlogs', 'ContactUs', 'AbcBlog', 'teams', 'testimonials'));
    }

    public function redirect()
    {
        $user = Auth::user();
        $usertype = Auth::user()->role;
        if ($usertype == '1') {
            return redirect('admin-dashboard');
        } else {
            return view('frontend.home');
        }
    }
    public function userContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50',
            'phone' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'message' => 'required'
        ]);
        if ($validator->passes()) {
                $data = new UserContactDetail();
                $data->uuid = Str::uuid();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->number = $request->phone;
            $data->message = $request->message;
            $save = $data->save();
            if($save){
                return response()->json(['success'=>'/']);
            }
        }
        // return response()->json($validator->errors());
        return response()->json(['error'=>$validator->errors()]);
    }
    public function adminDashboard()
    {
        $users = User::where('role', '0')->count();
        $today = date('Y-m-d');
        $contact = UserContactDetail::whereDate('created_at', '=', $today)->get();

        return view('admin.dashboard', compact('users','contact'));
    }

    public function userDashboard()
    {
        return view('user.dashboard');
    }
}
