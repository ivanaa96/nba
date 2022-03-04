<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->middleware('auth', ['only' => 'logout']);
    }

    public function getRegisterForm()
    {
        return view('auth.register');
    }

    public function register(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        Auth::login($user);
        return redirect('/teams');
    }

    public function getLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            return redirect('/teams');
        } else {
            return view('auth.login', ['invalidCredentials' => true]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
