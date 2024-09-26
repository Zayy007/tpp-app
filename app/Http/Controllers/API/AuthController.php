<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;
use App\Services\AuthService;

class AuthController extends BaseController
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }


    public function login(LoginRequest $request)
    {
        try {
            $creditals = $request->only(['email', 'password']);

            if (!Auth::attempt($creditals)) {
                return $this->error("Your Email & Password doesn't match!", null, 401);
            }

            $user = $this->authService->login($creditals['email']);

            $result = new LoginResource($user);

            return $this->success($result, "User Logged In Successfully!", 200);
        } catch (Exception $e) {

            return $this->error($e->getMessage() ? $e->getMessage() : "Someting went wrong!", null, $e->getCode() ? $e->getCode() : 500);
        }
    }

    public function register(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required'
            ]);

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => "Validation Error!",
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'user' => $user,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'meassage' => $e->getMessage(),
            ], 500);
        }
    }
}
