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
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProfile($id)
    {
        $user = User::findOrFail($id);

        $local = Local::pluck('name', 'id');

        return view('site.profile.info', compact('local', 'user'));
    }

    /**
     * @param $id
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postProfile($id, UserRequest $request)
    {
        $user = User::findOrFail($id);

        $passOld = $user->password;

        if ($request->password == $passOld) {
            $passNew = $passOld;
        } else {
            $passNew = bcrypt($request->password);
        }

        $request->merge([
            'password' => $passNew,
            'remove' => config('page.user.remove.active'),
        ]);

        $user->update($request->all());

        return redirect()->route('get_profile', $id)->with('success', trans('common.with.edit_success'));
    }
}

