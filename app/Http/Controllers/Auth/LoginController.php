<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * User login
     */
    public function __invoke(AuthRequest $request): JsonResponse
    {
        // Attempt to authenticate the user
        $request->authenticate();

        // Return success response with the user data and token
        $token = Auth::user()->createToken('login_token')->plainTextToken;

        return response()->json(['message' => 'User login successfully', 'user' => Auth::user(), 'token' => $token]);
    }
}
