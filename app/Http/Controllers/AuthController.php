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
    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect('/');
            }else{
                return back()->with('fail', 'Wrong password!');
            }
        }else{
            return back()->with('fail', 'Wrong email!');
        }
    }


    public function register(){
        return view("auth.register");
    }
    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $res = $user->save();
        if($res){
            return back()->with('success', 'You have registered successfully!');
        }else{
            return back()->with('fail', 'Something went wrong!');
        }
    }

    public function profile(){

    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect("/");
        }
    }
}
