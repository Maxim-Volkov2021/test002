<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminLoginForm;
use App\Http\Requests\LoginForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginFrom()
    {
        return view('admin.auth.login');
    }

    public function login(AdminLoginForm $request)
    {
        if(auth('admin')->attempt($request->validated()))
        {
            return redirect(route('admin.cars.index'));
        }
        else
        {
            return redirect(route('admin.login'));
        }
    }
    public function logout()
    {
        auth('admin')->logout();

        return redirect(route('home'));
    }
/*    public function test(Request $request)
    {

        dd(Auth::user()->get('email'));
    }*/
}
