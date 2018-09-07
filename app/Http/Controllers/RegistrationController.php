<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registrations/index');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            ]);

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            ]);

        auth()->attempt(request(['email', 'password']));

        return redirect()->home();
    }
}
