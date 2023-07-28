<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;


class SocialController extends Controller
{
    public function googleRedirect(){
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback(){
        $user = Socialite::driver('google')->user();
        $this->_registerOrLoginGoogleUser($user);

        return Inertia::render('Posts');
    }

    protected function _registerOrLoginGoogleUser($incomingUser){
        $user = User::where('google_id', $incomingUser->id)->first();
        if (!$user){
            $user = new User();
            $user->name = $incomingUser->name;
            $user->email = $incomingUser->email;
            $user->google_id = $incomingUser->id;
            $user->password = encrypt('password');
            $user->save();
        }
        Auth::login($user);
    }
}
