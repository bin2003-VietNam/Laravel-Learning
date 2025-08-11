<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;


class RegisteredUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }
    public function store(){
        // validate
        $attributes = request()->validate([
           'first_name'     => ['required','string'],
           'email'          => ['required','email'],
           'password'       => ['required', 'min:6'],
        ]);
        
        // create the user
        $user = User::create($attributes);

        // log in
        Auth::login($user);

        // redirect to somewhere
        return redirect('/jobs');
    }
}
