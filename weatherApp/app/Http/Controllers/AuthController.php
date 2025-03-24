<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\RegisterUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

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
//        $validated =
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:register_users|max:255',
            'employee_code' => 'required|string|unique:register_users|min:4|max:4',
            'user_role' => 'required|int',
            'password' => 'required|string|min:8|max:16',
        ]);

        $user = RegisterUser::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'employee_code' => $request->employee_code,
            'user_role' => $request->user_role,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));
        Auth::login($user);
        return redirect()->route('home');
    }

    public function Login(LoginRequest $request){
        $attributes = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|max:16',
            ]);
        if(!Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match.',
            ]);
        }

        request()->session()->regenerate();

        return redirect()->route('home');
    }


    // todo logout (Auth::logout() && redirect()->route('home')))
}
