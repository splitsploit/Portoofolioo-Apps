<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirect(){
        
        return Socialite::driver('google')->redirect();

    }

    public function callback(){
        $user = Socialite::driver('google')->user();
 
        $id = $user->id;
        $email = $user->email;
        $name = $user->name;

        return "$id - $email - $name";
    }
}
