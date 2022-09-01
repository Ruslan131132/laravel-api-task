<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateApi extends Middleware
{
    protected function authenticate($request, array $guards)
    {
        $token = $request->bearerToken() ?? $request->query('token') ?? $request->input('token');

        $user = User::where('token', $token)->first();

        if ($user) return;

        $this->unauthenticated($request, $guards);
    }
}
