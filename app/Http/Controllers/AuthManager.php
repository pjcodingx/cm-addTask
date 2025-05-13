<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{
    function login(){
       return view('auth.login');
    }

    function loginPost(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('username','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with('error', 'Invalid credentials');
    }

    //HANDLING REGISTRATION
    
    function register(){ //view for registration
        return view('auth.register');
    }

    function registerPost(Request $request){
        $request->validate([
            'username' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        
        if($user->save()){
            return redirect(route('login'))->with('success', 'Thank you for registering');
        }
        return redirect(route('register'))->with('error', 'Failed to register');
    }

    function logout(){
        Auth::logout();
        return redirect(route('login'));
    }
}
