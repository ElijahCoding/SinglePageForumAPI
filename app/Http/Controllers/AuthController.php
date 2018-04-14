<?php

namespace App\Http\Controllers;

use JWTAuth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\Auth\RegisterFormRequest;

class AuthController extends Controller
{
    public function signUp(RegisterFormRequest $request)
    {
      User::create([
        'username' => $request->json('username'),
        'email' => $request->json('email'),
        'password' => bcrypt($request->json('password')),
      ]);
    }

    public function signIn(Request $request)
    {
      try {
        $token = JWTAuth::attempt($request->only('email', 'password'), [
          'exp' => Carbon::now()->addWeek()->timestamp,
        ]);
      } catch (JWTException $e) {
        return response()->json([
          'error' => 'Could not autenticate.'
        ], 500);
      }

    if (!$token) {
      return response()->json([
        'error' => 'Could not autenticate.'
      ], 401);
    }

    return response()->json(compact('token'));
  }

}
