<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SignInRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\DB;
use App\User;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin()
    {
        return view('admin.auth.login');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.home');
    }

    /**
     * @param SignInRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logIn(SignInRequest $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt([
                'email' => $email,
                'password' => $password,
                'level_id' => config('page.user.role.super_admin'),
            ])
            || Auth::attempt([
                'email' => $email,
                'password' => $password,
                'level_id' => config('page.user.role.manager'),
            ])) {
            return redirect('admin/home')->with('success', trans('common.login.success'));
        } else {
            return redirect()->back()->with('message', trans('common.login.failed'));
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logOut()
    {
        if (Auth::user() && Auth::user()->level_id == config('page.user.role.manager')) {

            Auth::logout();
        }

        return redirect('admin/login');
    }
}

