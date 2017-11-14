<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function vk()
    {
        return Socialite::with('vkontakte')->redirect();
    }
}
