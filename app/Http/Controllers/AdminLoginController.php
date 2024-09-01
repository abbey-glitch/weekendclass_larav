<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
    //
    public function showlogin()
    {
        return view('auth.admin.login');
    }
}
