<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

if(!function_exists('user_email')){
    function getUserName()
    {
        $user = User::where('id', '=', Session::get('loginId'))->first();

        return $user->name;
    }
}
