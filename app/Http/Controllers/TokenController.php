<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TokenController extends Controller
{
    public function store(Request $request)
    {
        $validatedRequest = $this->validateToken($request);
        $user = User::where('email', $validatedRequest['email'])->first();
        $token = $user->createToken($validatedRequest['email']);
        return ['token' => $token->plainTextToken];
    }

    private function validateToken(Request $request)
    {
        return $request->validate([
            'email' => 'required|email',
            'token_name' => 'required|string'
        ]);        
    }
}
