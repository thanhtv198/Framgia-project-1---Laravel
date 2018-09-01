<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController;
use App\Models\Respond;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class InteractionController extends Controller
{
    public function getRespond()
    {
        $responds = Respond::orderBy('id', 'DESC');

        return view('admin.interaction.respond.index', compact('responds'));
    }

    public function deleteRespond($id)
    {
        try {
            $respond = Respond::findOrFail($id);
            $respond->delete();

            return redirect('admin/respond/index')->with('success', trans('common.with.delete_success'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
    }

    public function searchRespond(Request $req)
    {
        $responds = Respond::where('title', 'like', '%' . $req->key . '%')->orwhere('content', 'like', '%' . $req->key . '%')->get();

        return view('admin.interaction.respond.index', compact('responds'));
    }

    public function check($id)
    {
        Respond::where('id', $id)->update(['status' => 1]);

        return redirect()->back();
    }
}

