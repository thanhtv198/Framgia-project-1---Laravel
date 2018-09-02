<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Requests\ManufactureRequest;
use App\Models\Manufacture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController;

class ManufactureController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $manufactures = Manufacture::all();

        return view('admin.product.manufacture.index', compact('manufactures'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $manufactures = Manufacture::pluck('name', 'id');

        return view('admin.product.Manufacture.add', compact('manufactures'));
    }

    /**
     * @param ManufactureRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ManufactureRequest $request)
    {
        Manufacture::create($request->all());

        return redirect()->route('manufacture.index')->with('success', trans('common.with.add_success'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $manufacture = Manufacture::findOrFail($id);

        return view('admin/product/manufacture/edit', compact('manufacture'));
    }

    /**
     * @param $id
     * @param ManufactureRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, ManufactureRequest $request)
    {
        $manufacture = Manufacture::findOrFail($id);

        $manufacture->update($request->all());

        return redirect()->route('manufacture.index')->with('success', trans('common.with.edit_success'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $manufacture = Manufacture::findOrFail($id);

        $manufacture->delete();

        return redirect()->route('manufacture.index')->with('success', trans('common.with.delete_success'));
    }

    public function searchManufacture(Request $req)
    {
        $manufactures = Manufacture::search($req->key)->get();

        return view('admin.product.manufacture.index', compact('manufactures'));
    }
}

