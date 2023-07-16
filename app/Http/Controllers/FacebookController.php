<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Exception;
use App\Models\User;

class FacebookController extends Controller
{
    public function redirectfacebook()
    {
        return Socialite::driver('facebook')->redirect();
    } 

    public function facebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
     
            $saveUser = User::updateOrCreate([
                'facebook_id' => $user->getId(),
            ],[
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => Hash::make($user->getName().'@'.$user->getId())
                 ]);
     
            Auth::loginUsingId($saveUser->id);
     
            return redirect()->route('home');
            } catch (\Throwable $th) {
               throw $th;
            }
    }
}
