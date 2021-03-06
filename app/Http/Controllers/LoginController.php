<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// added by me
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    //

    public function facebookLogin()
    {
        $redirect = Socialite::driver('facebook')->redirect();

        return $redirect;
    }

    public function facebookLoginCallback()
    {
        $user = Socialite::driver('facebook')->user();

        // dd($user); // laravel dumper

        // ref: https://stackoverflow.com/questions/48662087/validation-rule-for-social-login

        $user->provider = 'facebook';
        session(['login' => $user]);

        // if ok, redirect to main page. e.g. redirect('/');
        return redirect()->route('home');
    }

    public function googleLogin()
    {
        $redirect = Socialite::driver('google')->redirect();

        return $redirect;
    }

    public function googleLoginCallback()
    {
        $user = Socialite::driver('google')->user();
        
        // dd($user); // laravel dumper

        $user->provider = 'google';
        session(['login' => $user]);

        // if ok, redirect to main page. e.g. redirect('/');
        return redirect()->route('home');
    }

    public function lineLogin()
    {
        $redirect = Socialite::driver('line')->redirect();

        return $redirect;
    }

    public function lineLoginCallback()
    {
        $user = Socialite::driver('line')->user();
        
        // dd($user); // laravel dumper

        $user->provider = 'line';
        session(['login' => $user]);

        // if ok, redirect to main page. e.g. redirect('/');
        return redirect()->route('home');
    }
}
