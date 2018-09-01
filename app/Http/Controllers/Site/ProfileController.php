<?php

namespace App\Http\Controllers\Site;

use App\Models\Local;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Auth\AuthController;
use App\Models\User;
use App\Http\Requests\UserRequest;

class ProfileController extends Controller
{
    public function getProfile($id)
    {
        try {
            $user = User::findOrFail($id);
            $local = Local::pluck('name', 'id');

            return view('site.profile.info', compact('local', 'user'));
        } catch (ModelNotFoundException $e) {
            return view('site.404');
        }
    }

    public function postProfile($id, UserRequest $request)
    {
        try {
            $user = User::findOrFail($id);
            $passOld = $user->password;
            if ($request->password == $passOld) {
                $passNew = $passOld;
            } else {
                $passNew = bcrypt($request->password);
            }
            $request->merge([
                'password' => $passNew,
                'remove' => 0,
            ]);
            $user->update($request->all());

            return redirect()->route('get_profile', $id)->with('success', trans('common.with.edit_success'));

        } catch (ModelNotFoundException $e) {
            return view('site.404');
        }
    }
}

