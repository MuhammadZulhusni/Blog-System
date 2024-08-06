<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', // Folder register > index file
    [
        'title' => 'Register'
    ]); 
    }

    public function store(Request $request)
    {
        // return request()->all(); Ni nk check data dh masuk belum
        $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users', // Corrected from 'user' to 'users'
            'password' => 'required|min:5|max:255',
        ]);
        

        // dd("Successful");
    }
}
