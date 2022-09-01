<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        Session::put('action', 'login');
        $formFields = $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);

        if (Auth::attempt($formFields)) {
            return redirect()->back()->with('success', 'User ' . Auth::user()->email . ' successfully logged in');;
        }

        return redirect()->back()->withErrors(['password' => 'Bad Password!']);
    }
}
