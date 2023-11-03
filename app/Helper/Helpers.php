<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

if(!function_exists('getUserName')){
    function getUserName()
    {
        $user = User::where('id', '=', Session::get('loginId'))->first();

        return $user->name;
    }
}
