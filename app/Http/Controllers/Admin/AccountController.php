<?php

namespace App\Http\Controllers\Admin;

use App\Models\Local;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use App\Models\Level;
use Validator;
use App\Http\Requests\UserRequest;

class AccountController extends Controller
{
    public function getMember()
    {
        $members = User::where('level_id', '3')->get();

        return view('admin.account.member.index', compact('members'));
    }

    public function addMember()
    {
        $level = Level::pluck('role', 'id');
        $local = Local::pluck('name', 'id');

        return view('admin.account.member.add', compact('level', 'local'));
    }

    public function postAddMember(UserRequest $request)
    {
        $request->merge([
            'password' => bcrypt($request->password),
            'remove' => 0,
        ]);
        User::create($request->all());

        return redirect('admin/member/index')->with('success', trans('common.with.add_success'));
    }

    public function editMember($id)
    {
        try {
            $user = User::findOrFail($id);
            $level = Level::pluck('role', 'id');
            $local = Local::pluck('name', 'id');

            return view('admin/account/member/edit', compact('level', 'user', 'local'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
    }

    public function postEditMember($id, UserRequest $request)
    {
        try {
            $user = User::findOrFail($id);
            $pass_old = $user->password;
            if ($request->password == $pass_old) {
                $pass_new = $pass_old;
            } else {
                $pass_new = bcrypt($request->password);
            }
            $request->merge([
                'password' => $pass_new,
                'remove' => 0,
            ]);
            $user->update($request->all());

            return redirect('admin/member/index')->with('success', trans('common.with.edit_success'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
    }

    public function deleteMember($id)
    {
        try {
            User::remove($id);

            return redirect('admin/member/index')->with('success', trans('common.with.delete_success'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
    }

    public function deleteMulMember(Request $request)
    {
        if ($request->check == null) {
            return redirect('admin/member/index')->with('message', trans('common.with.delete_ept'));
        }
        for ($i = 0; $i < count($request->check); $i++) {
            $user = User::findOrFail($request->check[$i]);
            $user->delete();
        }

        return redirect('admin/member/index')->with('success', trans('common.with.delete_success'));
    }

    public function searchMember(Request $req)
    {
        $members = User::where('name', 'like', '%' . $req->key . '%')->where('level_id', '3')->get();

        return view('admin.account.member.index', compact('members'));
    }

    public function getManager()
    {
        $managers = User::where('level_id', '<>', '3')->get();

        return view('admin.account.manager.index', compact('managers'));
    }

    public function addManager()
    {
        $level = Level::pluck('role', 'id');
        $local = Local::pluck('name', 'id');

        return view('admin.account.manager.add', compact('level', 'local'));
    }

    public function postAddManager(UserRequest $request)
    {
        $request->merge([
            'password' => bcrypt($request->password),
            'remove' => 0,
        ]);
        User::create($request->all());

        return redirect('admin/manager/index')->with('success', trans('common.with.add_success'));
    }

    public function editManager($id)
    {
        try {
            $user = User::findOrFail($id);
            $level = Level::pluck('role', 'id');
            $local = Local::pluck('name', 'id');

            return view('admin/account/manager/edit', compact('level', 'user', 'local'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
    }

    public function postEditManager($id, UserRequest $request)
    {
        try {
            $user = User::findOrFail($id);
            $pass_old = $user->password;
            if ($request->password == $pass_old) {
                $pass_new = $pass_old;
            } else {
                $pass_new = bcrypt($request->password);
            }
            $request->merge([
                'password' => $pass_new,
                'remove' => 0,
            ]);
            $user->update($request->all());

            return redirect('admin/manager/index')->with('success', trans('common.with.edit_success'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
    }

    public function deleteManager($id)
    {
        try {
            if (auth()->user()->id == $id) {
                return back()->with('message', trans('common.with.delete_error'));
            }
            User::remove($id);

            return redirect('admin/manager/index')->with('success', trans('common.with.delete_success'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
    }

    public function searchManager(Request $req)
    {
        $managers = User::where('name', 'like', '%' . $req->key . '%')->where('level_id', '<>', '3')->get();

        return view('admin.account.manager.index', compact('managers'));
    }

    public function deleteMulManager(Request $request)
    {
        if ($request->check == null) {
            return redirect('admin/manager/index')->with('message', trans('common.with.delete_ept'));
        }
        for ($i = 0; $i < count($request->check); $i++) {
            $user = User::findOrFail($request->check[$i]);
            if (auth()->user()->id = $request->check[$i]) {
                return back()->with('message', trans('common.with.delete_error'));
            }
            $user->delete();
        }

        return redirect('admin/manager/index')->with('success', trans('common.with.delete_success'));
    }
}

