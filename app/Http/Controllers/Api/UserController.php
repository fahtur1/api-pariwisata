<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function loginUser(Request $request)
    {
        $user = User::where('email', $request->json('email'))->first();
        $password = $request->json('password');

        if ($user) {
            if (Hash::check($password, $user->password)) {
                return response()->json([
                    'data' => 'Berhasil Login!'
                ]);
            }

            return response()->json([
                'message' => 'Password salah'
            ], 400);
        }

        return response()->json([
            'message' => 'User tidak ditemukan'
        ], 404);
    }

    public function registerUser(Request $request)
    {
        $data = [
            'id_user' => uniqid(),
            'name' => $request->json('name'),
            'email' => $request->json('email'),
            'password' => Hash::make($request->json('password'))
        ];

        $user = User::create($data);

        if ($user) {
            return response()->json([
                'message' => 'User berhasil mendaftar !'
            ]);
        } else {
            return response()->json([
                'message' => 'Gagal mendaftar.'
            ], 400);
        }
    }
}
