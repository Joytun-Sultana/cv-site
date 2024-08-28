<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['user' => $user, 'message' => 'Registration successful'], 201);
    }

    public function login(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|string|email',
        //     'password' => 'required|string',
        // ]);

        // if (!Auth::attempt($request->only('email', 'password'))) {
        //     return response()->json(['message' => 'Unauthorized'], 401);
        // }

        // $user = Auth::user();

        // return response()->json(['user' => $user, 'message' => 'Login successful']);
        return "hello";
    }

    public function getUser(Request $request)
    {
        return response()->json($request->user());
    }
    public function store(Request $request){
        p($request->all());
    }
    function list(){
        
    }
}
