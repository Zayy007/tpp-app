<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class AuthService
{
    public function login($email)
    {
        $user = User::where('email', $email)->first();

        $user['token'] = $user->createToken('API')->plainTextToken;

        return $user;
    }
}
