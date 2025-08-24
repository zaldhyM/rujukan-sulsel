<?php

namespace App\Http\Controllers\application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as AplicationUserModel;
use App\Models\master\Faskes as FaskesModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            $user = Auth::user(); // Ambil data user yang berhasil login

            $datafaskes = FaskesModel::find($user->id_faskes);

            $token = $request->user()->createToken('api-token')->plainTextToken;
            return response()->json([
                'token' => $token,
                "success" => $token ? true : false,
                'user' => $user,
                'faskes' => $datafaskes, 
                'message' => 'Login berhasil'
            ]);
        }
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function logout(Request $request)
    {
        // Hapus token user yang sedang login
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout berhasil']);
    }

    public function getUser(Request $request)
    {
        return response()->json($request->user());
    }

    public function register(Request $request)
    {
        // $request->validate([
        //     'nama' => 'required|string|max:255',
        //     'email' => 'required|string|email|unique:users,email',
        //     'password' => 'required|string|min:6',
        // ]);

        $user = AplicationUserModel::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'nik' => $request->nik,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'id_faskes' => $request->id_faskes,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user,
        ], 201);
    }
}
