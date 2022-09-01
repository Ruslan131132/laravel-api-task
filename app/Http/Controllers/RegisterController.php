<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function save(Request $request)
    {
        Session::put('action', 'register');
        $validateFields = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'min:6|required_with:passwordConfirmation',
            'passwordConfirmation' => 'same:password'
        ]);

        $user = User::create($validateFields);

        if ($user) {
            Auth::login($user);
            $user->token = Str::random(20);
            $user->save();
            return redirect()->back()->with('success', 'User ' . $user->email . ' successfully registered');
        }

        return redirect()->route('home')->with('error', 'Error with registration ' . $user->email);
    }
}
