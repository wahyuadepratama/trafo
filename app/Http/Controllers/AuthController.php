<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Auth;
use Auth;
use Illuminate\Http\Request;

use App\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
      $credentials = $request->only('username', 'password');
      if (Auth::attempt($credentials)) {
        $credentials['id'] = Auth::user()->id;
        $credentials['token'] = encrypt($credentials);
        return response()->json([
          'success' => true,
          'message' => 'Berhasil login',
          'data' => $credentials
        ], 200);
      }else {
        return response()->json([
          'success' => false,
          'message' => 'Username atau Password Salah!',
          'data' => null
        ], 200);
      }
    }
}
