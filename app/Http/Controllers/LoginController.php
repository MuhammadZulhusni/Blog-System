<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function index()
    {
        return view('login.index', // Folder login > index file
    [
        'title' => 'Login'
    ]); 
    }

    public function authenticate(Request $request)
    { 
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            return redirect()->intended('/');
        }
    
        return back()->with(['Error' => 'Login Failed!!!!'])->onlyInput('email');
    }
        // dd("Successful");


    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }

}
