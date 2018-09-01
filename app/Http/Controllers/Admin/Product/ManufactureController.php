<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Requests\ManufactureRequest;
use App\Models\Manufacture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController;

class ManufactureController extends Controller
{
    public function index()
    {
        $manufactures = Manufacture::all();

        return view('admin.product.manufacture.index', compact('manufactures'));
    }

    public function create()
    {
        $manufactures = Manufacture::pluck('name', 'id');

        return view('admin.product.Manufacture.add', compact('manufactures'));
    }

    public function store(ManufactureRequest $request)
    {
        Manufacture::create($request->all());

        return redirect()->route('manufacture.index')->with('success', trans('common.with.add_success'));
    }

    public function show($id)
    {
        $manufacture = Manufacture::findOrFail($id);

        return view('admin/product/manufacture/edit', compact('manufacture'));
    }

    public function update($id, ManufactureRequest $request)
    {
        $manufacture = Manufacture::findOrFail($id);
        $manufacture->update($request->all());

        return redirect()->route('manufacture.index')->with('success', trans('common.with.edit_success'));
    }

    public function delete($id)
    {
        $manufacture = Manufacture::findOrFail($id);
        $manufacture->delete();

        return redirect()->route('manufacture.index')->with('success', trans('common.with.delete_success'));
    }

    public function searchManufacture(Request $req)
    {
        $manufactures = Manufacture::where('name', 'like', '%' . $req->key . '%')->get();

        return view('admin.product.manufacture.index', compact('manufactures'));
    }
}

