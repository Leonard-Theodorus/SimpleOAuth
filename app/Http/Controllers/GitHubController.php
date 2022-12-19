<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
class GitHubController extends Controller
{
    public function redirect() {
        return Socialite::driver('github')->redirect();
    }
    public function callback(){
        $auth_user = Socialite::driver('github')->user();
        $validate = User::where('name', '=', $auth_user->name)->first();
        if($validate == false) {
            $validate = new User();
            $validate->name = $auth_user->name;
            $validate->email = $auth_user->email;
            $validate->provider_id = $auth_user->id;
            $validate->avatar = $auth_user->avatar;
            $validate->save();
        }
        Auth::login($validate);
        return view('appPages.home', ['username' => $validate->name, 'message' => 'Logged In Using Github']);
    }
}
