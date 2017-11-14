<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function vk()
    {
        return Socialite::with('vkontakte')->scopes(['email', 'ads'])->redirect();
    }


    public function logout()
    {
        if( Auth::check() ){
            Auth::user()->token = NULL;
            Auth::user()->save();
            Auth::logout();
        }

        return \Redirect::to('/');

    }
}
