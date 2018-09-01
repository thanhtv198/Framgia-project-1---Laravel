<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\DB;
use App\User;

class AdminController extends Controller
{
    public function getLogin()
    {
        return view('admin.auth.login');
    }

    public function index()
    {
        return view('admin.home');
    }

    public function logIn(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ],
            [
                'email.required' => trans('common.validate.email'),
                'email.email' => trans('common.validate.valid_email'),
                'password.required' => trans('common.validate.password'),
                'password.min' => trans('common.validate.valid_password'),
            ]
        );

        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password, 'level_id' => 1]) || Auth::attempt(['email' => $email, 'password' => $password, 'level_id' => 2])) {
            return redirect('admin/home')->with('success', trans('common.login.success'));
        } else {
            return redirect()->back()->with('message', trans('common.login.failed'));
        }
    }

    public function logOut()
    {
        if (Auth::user() && Auth::user()->level_id == 1) {
            Auth::logout();
        }

        return redirect('admin/login');
    }
}

