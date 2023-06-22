<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }
    public function loginUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            $request->session()->put('loginId', $user->id);
            return redirect('/');
        }
        return back()->with('fail', 'Invalid email or password.');
    }

    public function register(){
        return view("auth.register");
    }

    public function registerUser(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5'
        ]);
        $user = User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password'])
        ]);
        if ($user) {
            return back()->with('success', 'You have registered successfully!');
        }
        return back()->with('fail', 'Something went wrong!');
    }

    public function logout()
    {
        Session::forget('loginId');
        return redirect('/');
    }
}
