<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ApiResponseController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|max:99',
            'email'    => 'required|email|max:255',
            'password' => 'required|max:99|confirmed'
        ]);

        $data = [
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password)
        ];
        
        User::create($data);
        
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return ApiResponseController::apiResponse(true, 'Registered successfully', auth()->user(), 200);
        }

    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|max:99',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return ApiResponseController::apiResponse(true, 'Login successfully', auth()->user(), 200);
        }
    }

    public function logout(Request $request)
    {
        if (Auth::logout()) {
            return ApiResponseController::apiResponse(true, 'Logout successfully', '', 200);
        }
    }
}
