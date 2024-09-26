<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class AuthService
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        $user['token'] = $user->createToken('API')->plainTextToken;

        return $user;
    }
}
