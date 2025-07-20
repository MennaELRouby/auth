<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use APP\Http\Resources\UserResource;


class LoginController extends Controller
{
    //
    public function login(LoginRequest $request){
        $credentials = $request->only('email', 'password');
        if(!Auth::attempt($credentials)) {
            return response()->json(['message'=>'Invalid credentials'], 401);
            }
            $user = Auth::user();
            // $user = User::where('email', $request->email)->firstOrFail();
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json(['message' => 'Login successful', 'user' => new UserResource($user), 'token' => $token], 200);
}
}
