<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class CabinetController extends Controller
{
    public function index()
    {
        return view('cabinet.index');
    }

}
