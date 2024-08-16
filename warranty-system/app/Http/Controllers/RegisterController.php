<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store()
    {
        // validation
        $attribute = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        
        // create user
        $user = User::create($attribute);
        // log in
        Auth::login($user);
        // redirect
        return redirect('/');
    }
}
