<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginForm;
use App\Http\Requests\PasswordRecoverForm;
use App\Http\Requests\RegisterForm;
use App\Mail\PasswordRecover;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginForm $request)
    {
        if(auth('web')->attempt($request->validated()))
        {
            return redirect(route('home'));
        }

        return redirect(route('login'))->withErrors([
            'email'=>'Не вірні дані або користувач не знайдений'
        ]);
    }

    public function logout()
    {
        auth('web')->logout();

        return redirect(route('home'));
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(RegisterForm $request)
    {
        $user = User::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>bcrypt($request['password'])
        ]);

        if ($user)
        {
            auth('web')->login($user);
        }
        return redirect(route('home'));
    }
    public function showPasswordRecoverForm()
    {
        return view('auth.password_recover');
    }

    public function PasswordRecover(PasswordRecoverForm $request)
    {
        $user = User::where($request->validated())->first();

        $password = uniqid();

        $user->password = bcrypt($password);
        $user->save();

        Mail::to($request['email'])->send(new PasswordRecover($password));

        return redirect(route('login'));
    }

}
