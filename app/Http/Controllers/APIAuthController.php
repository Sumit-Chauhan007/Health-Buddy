<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class APIAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api',['except'=>['login','forgot','register']]);
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|string|email|unique:users',
            'phone' => 'min:10|max:10|regex:/[0-9]/|unique:users',
            'password'=>'required|string|confirmed|min:8',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $user = User::create(array_merge(
            $validator->validated(),
            ['password'=>Hash::make($request->password)]
        ));
        return response()->json([
            'message'=>'Registered Successfully',
            'user'=>$user
        ],200);
    }

    public function login(Request $request)
    {
        // function to login using APIs
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        if(!$token=\JWTAuth::attempt($validator->validated())){
            return response()->json([
                'status'=> '401',
                'message'=>'Unauthorized Access',
            ],401);
        }
        return $this->createNewToken($token);
    }

    public function createNewToken($token)
    {
        // creates access token on new login
        return response()->json([
            'status'=> '200',
            'message'=>'Login Successfull',
            'userName'=>auth()->user()->name,
            'access_token'=>$token,
            'token_type'=>'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
        ]);
    }

    public function profile()
    {
        if(Auth()){
            return response()->json(auth()->user());
        }
        if(!Auth()){
            return response()->json(['message'=>'Login Required'],400);
        }                
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'message'=>'Logout Successfully'
        ],200);
    }

    public function editprofile(Request $request)
    {
        $id = Auth::user()->id;
        // return $id;
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z ]*$/|min:3|max:30',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'phone' => 'min:10|max:10|regex:/[0-9]/|unique:users,phone,'.$id,
            // 'password' => 'string|min:8',
            'image' => 'mimes:jpeg,jpg,png|max:500'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        $data = User::find($id);
        if(!$data){
            return response()->json([
                'message'=>'User Not Found'
            ],404);
        }
        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('userimage',$imagename);
            $data->profile_photo_path = $imagename;
        } 
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->phone = $request->phone;
        $data->save();
        return response()->json([
            'message'=>'Updated Successfully',
            'user'=>$data
        ],200);
    }

    public function createUser(Request $request)
    {
        if (Auth::user() &&  Auth::user()->role == 1) {
            $validator = Validator::make($request->all(),[
                'name'=>'required',
                'email'=>'required|string|email|unique:users',
                'password'=>'required|string|min:8',
                'phone'=>'required|string|unique:users',
            ]);
            if($validator->fails()){
                return response()->json($validator->errors(),400);
            }
            $user = User::create(array_merge(
                $validator->validated(),
                ['password'=>Hash::make($request->password)]
            ));
            return response()->json([
                'message'=>'User Created Successfully',
                'user'=>$user
            ],200);
        }
        return response()->json([
            'message'=>'Not Authorized'
        ],200);        
    }  

    public function actUser(Request $request)
    {
        if (Auth::user() &&  Auth::user()->role == 1){
            $validator = Validator::make($request->all(),[
                'id'=>'required'
            ]);
            if($validator->fails()){
                return response()->json($validator->errors(),400);
            }
            $id = $request->id;
            $data = User::find($id);
            $data = User::where('id', $id)
            ->update([
                'status' => 'active'
            ]);
            return response()->json([
                'message'=>'User Activated'
            ],200);
        } 
        return response()->json([
            'message'=>'Not Authorized'
        ],400);       
    }

    public function deactUser(Request $request)
    {
        if (Auth::user() &&  Auth::user()->role == 1){
            $validator = Validator::make($request->all(),[
                'id'=>'required'
            ]);
            if($validator->fails()){
                return response()->json($validator->errors(),400);
            }
            $id = $request->id;
            $data = User::find($id);
            $data = User::where('id', $id)
            ->update([
                'status' => 'in-active'
            ]);
            return response()->json([
                'message'=>'User De-Activated'
            ],200);
        } 
        return response()->json([
            'message'=>'Not Authorized'
        ],400);       
    } 

    public function forgot(Request $request)
    {
        // function to recover forgotten password
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        $credentials = $request->all();
        $user_check = User::where('email', $request->email)->first();
        if(!$user_check){
            return response()->json([
                'status'=> '404',
                'message'=>"Whoops! We can't find a registered user with that email address."
            ],200);
        }else{
            $response = Password::sendResetLink($credentials);
            return response()->json([
                'status'=> '200',
                'message'=>'Reset password Link has been sent to your email.'
            ],200);
        }
        
    }
}
