<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// added by me
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    //

    public function fbLogin()
    {
        $redirect = Socialite::driver('facebook')->redirect();

        return $redirect;
    }

    public function fbLoginCallback()
    {
        $user = Socialite::driver('facebook')->user();

        echo '<pre>';
        var_dump($user);
        echo '</pre>';

        // if ok, redirect to main page. e.g. redirect('/');
        // return redirect()->route('home');
    }
}
