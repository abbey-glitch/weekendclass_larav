<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController extends Controller
{
    //
    public function showregister()
    {
        return view('auth.admin.register');
    }
    public function adminregister(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if($request->password == $request->password_confirmation){
            $admin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $admin->save();
            return redirect('/admin/login');
        }else{
            return redirect('/admin/register')->with('message', 'Password does not match');
        }
    }
}
