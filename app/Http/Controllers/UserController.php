<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request)
  {
      $this->validate($request, [
          'username' => 'required|unique:users',
          'password' => 'required|min:6'
      ]);

      $username = $request->input('username');
      $password = Hash::make($request->input('password'));

      $user = User::create([
          'username' => $username,
          'password' => $password
      ]);

      return response()->json(['message' => 'Data added successfully'], 201);
  }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:6'
        ]);
  
        $username = $request->input('username');
        $password = $request->input('password');
  
        $user = User::where('username', $username)->first();
        if (!$user) {
            return response()->json(['message' => 'username tidak ditemukan'], 401);
        }
  
        $isValidPassword = Hash::check($password, $user->password);
        if (!$isValidPassword) {
          return response()->json(['message' => 'password tidak benar'], 401);
        }
  
        $generateToken = bin2hex(random_bytes(40));
        $date = date('Y-m-d H:i:s');
        $expire = date('Y-m-d H:i:s',strtotime("$date +2 day"));
        $user->update([
            'token' => $generateToken,
            'expire' => $expire
        ]);
  
        return response()->json($user);
    }
} 