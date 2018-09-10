<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['only' => 'index']);
    }

    public function index()
    {
        return view('sessions.index');
    }

    public function store()
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required',
            ]);

        if (!auth()->attempt(request(['email', 'password']))) {
            return back();
        }

        return redirect()->back();
    }

    public function admin()
    {
        $admins = auth()->user()->all()->where('is_admin', true);

        return view('sessions/index', compact('admins'));
    }

    public function newAdmin()
    {
        $this->validate(request(), [
            'email' => 'required|exists:users,email',
            ]);

        auth()->user()->where('email', request('email'))->update([
            'is_admin' => true,
            ]);

        return redirect()->back();
    }

    public function removeAdmin()
    {
        $this->validate(request(), [
            'email' => 'required|exists:users,email',
            ]);

        auth()->user()->where('email', request('email'))->update([
            'is_admin' => false,
            ]);

        return redirect()->back();
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->back();
    }
}
