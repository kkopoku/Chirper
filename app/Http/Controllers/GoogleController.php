<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    function loginWithGoogle(){
        // return Socialite::driver('google')->redirect();
    }
}
