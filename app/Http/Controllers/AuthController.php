<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function showRegistrationForm(){
           return view('auth.register');
    }
    public function register(RegisterRequest $request){
            $validated = $request->validated();
            $user = User::Create([ 
                  "name" => $validated['name'],
                  "email" => $validated['email'],
                  "password" => Hash::make($validated['password']),
            ]);
            Auth::login($user);
            return redirect()->route('login')->with('success', 'Registration successful!');
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(LoginRequest $request){
           $credentials = $request->only('email','password');
           if(Auth::attempt($credentials)){
            return redirect()->intended('home')->with('success', 'Login successful!');
        }
           return redirect()->back()->with('error', 'Invalid credentials.');
    }
    
   public function logout(){
    Auth::logout();
    return redirect()->route('login')->with('success','logout Succssfully done');
   }
}
