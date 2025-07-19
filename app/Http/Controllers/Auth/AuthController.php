<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function profile(Request $request){
        return response()->json([
            'message' => 'User profile retrieved successfully',
            'user' => $request->user(),
        ]);
    }
}
