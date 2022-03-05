<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Verification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


class AuthController extends Controller
{
    public function register(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        //izbacuje error: call to undefined method na m
        // event(new Registered($user));

        Mail::to($user)->send(
            new Verification($user)
        );

        return redirect('/login');
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

    //pokusaj email verifikacije
    // public function getEmailVerficationNotice()
    // {
    //     return view('auth.verify-email');
    // }

    // public function verifyEmail(EmailVerificationRequest $request)
    // {
    //     $request->fulfill();
    //     return redirect('/teams');
    // }
}
