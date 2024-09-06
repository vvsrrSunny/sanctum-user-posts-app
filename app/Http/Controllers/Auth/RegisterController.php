<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    /**
     * User register.
     */
    public function __invoke(AuthRequest $request): JsonResponse
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['message'=> 'User registered successfully' ,'user' => $user]);
    }
}
