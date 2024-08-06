<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);
    
        // Debugging
        // dd($validatedData);
    
        // Hash the password before storing
        $validatedData['password'] = bcrypt($validatedData['password']);
    
        User::create($validatedData);
        // dd("Successful");

        //Redirect and show a success message
        return redirect('/login')->with(['success' => 'Registration successfull! Please Login']);
    }
}
