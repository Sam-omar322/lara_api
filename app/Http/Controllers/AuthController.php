<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required', 
        ]);

        $data["password"] = Hash::make($request->newPassword);

        $user = User::create($data);

        $res = [
            "user" => $user,
            "token" => $user->createToken('tokenUser')->plainTextToken,
        ];

        return Response::json([$res], 201);
    }
}
