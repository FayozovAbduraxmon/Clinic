<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function save_user(Request $req)
    {
        $validation = $req->validate([
            'name' => 'required|max:100',
            'email' => 'required|email',
            'text' => 'required|max:500',
            'phone' => 'required|max:30',
            'address' => 'required|max:100',
            'password' => 'required|min:5',
        ]);

        User::create([
            'name' => $validation['name'],
            'email' => $validation['email'],
            'text' => $validation['text'],  
            'phone'=> $validation['phone'],
            'address'=> $validation['address'],
            'password' => Hash::make($validation['password']),
        ]);

        return $this->login($req);
    }

    function login(Request $req)
    {

        $tools = $req->only('name', 'password');

        if (!Auth::attempt($tools)) {
            return 'error';
        }


        return redirect()->route('profil');
    }
}
