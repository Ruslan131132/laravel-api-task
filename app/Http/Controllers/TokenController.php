<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TokenController extends Controller
{
    public function generate(Request $request)
    {

        if ($user = Auth::user()) {
            $user->token = Str::random(40);
            $user->save();

            return redirect()->back()->with(['successToken' => 'Token successfully updated!']);
        }

        return redirect()->back()->with('errorToken', 'Error!');
    }
}
