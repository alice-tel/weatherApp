<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\RegisterUser;
use App\Models\User;
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

        $request->validate([
            'first_name' => 'required|string|max:45',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:users|max:100',
            'employee_code' => 'string|min:10|max:10',
            'user_role' => 'required|int',
            'password' => 'required|string|min:8|max:16',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'name' => $request->last_name,
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

        session(['user_role' => Auth::user()->user_role]);
        dump(Auth::user()->user_role + "in login proces");

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {

        Auth::logout(); //auth carries the hard work yippie :D
        $request->session()->invalidate();//Make all unsaved changes invalid, for example a half filled in form
        $request->session()->regenerateToken(); //new token
        return redirect()->route('show.login');
    }


    // todo logout (Auth::logout() && redirect()->route('home')))
}
