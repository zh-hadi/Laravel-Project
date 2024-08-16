<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function store()
    {
        //validation
        $attribute = request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(!Auth::attempt($attribute)){
            return "this user not registered";
        }

        session()->regenerate();

        return redirect("/");
    }
}
