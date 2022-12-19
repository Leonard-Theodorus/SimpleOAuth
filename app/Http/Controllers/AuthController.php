<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginpage(){
        return view('authPages.login');
    }
    public function login(Request $req){
        $credentials = $req->validate([
            'name' => ['required'],
            'email' => ['email:dns', 'required'],
            'password' => ['required'],
        ]);
        $remember_me = $req->has('remember_me') ? true : false;
        if(Auth::attempt($credentials,$remember_me)){
            return view('appPages.home', ['message' => 'Logged In Using Normal Method', 'username' => $credentials['name']]);
        }
        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function registerpage(){
        return view('authPages.register');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:6', 'max:255'],
            'repassword' => ['same:password']
        ],
        [
            'repassword.same' => "Pasword must match"
        ]
        );
        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);
        return redirect('/login')->with('success', 'Sign-up sucessful! Please login');

    }
}
