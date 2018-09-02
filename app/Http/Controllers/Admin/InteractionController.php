<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController;
use App\Models\Respond;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class InteractionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRespond()
    {
        $responds = Respond::getAll()->get();

        return view('admin.interaction.respond.index', compact('responds'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteRespond($id)
    {
        $respond = Respond::findOrFail($id);

        $respond->delete();

        return redirect('admin/respond/index')->with('success', trans('common.with.delete_success'));
    }

    /**
     * @param Request $req
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchRespond(Request $req)
    {
        $responds = Respond::search($req->key)->get();

        return view('admin.interaction.respond.index', compact('responds'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function check($id)
    {
        Respond::where('id', $id)->update(['status' => 1]);

        return redirect()->back();
    }
}

