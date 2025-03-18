<?php

namespace App\Http\Controllers;

use App\Models\RegisterUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showRegister()
    {
        return view('auth.register');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function Register(Request $request){
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique|max:255',
            'employee_code' => 'required|string|unique|min:4|max:4',
            'user_role' => 'required|int',
            'password' => 'required|string|min:8|max:16',
        ]);

        $user = RegisterUser::create($validated);
        Auth::login($user);
        return redirect()->route('home');

    }
}
