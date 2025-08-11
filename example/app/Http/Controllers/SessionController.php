<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view("auth.login");
    }
    public function login(){
        // validate 
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password'=> ['required'],
        ]);
        // attempt to login the user
        if(!Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        };
        // regenerate session
        request()->session()->regenerate();
        // redirect
        return redirect('/jobs');
    }

    public function destroy(){
        Auth::logout();

        return redirect("/");
    }
}
