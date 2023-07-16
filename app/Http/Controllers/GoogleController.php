<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Exception;
use App\Models\User;

class GoogleController extends Controller
{
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    } 

    public function googleCallback()
    {
        try{
            $user = Socialite::driver('google')->user();
            $findUser = User::where('google_id',$user->id)->first();
            if($findUser){
                Auth::login($findUser);
                return redirect()->intended('redirect');
            }else{
                $newUser = User::create([
                    'name'=>$user->name,
                    'email'=>$user->email,
                    'google_id'=>$user->id,
                    'password'=>Hash::make('mypassword')
                ]);
                Auth::login($newUser);
                return redirect()->intended('redirect');
            }

        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
}
