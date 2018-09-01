<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.product.category.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('admin.product.category.add', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->all());

        return redirect()->route('category.index')->with('success', trans('common.with.add_success'));
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::pluck('name', 'id');

        return view('admin/product/category/edit', compact('category', 'categories'));
    }

    public function update($id, CategoryRequest $request)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('category.index')->with('success', trans('common.with.edit_success'));
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', trans('common.with.delete_success'));
    }

    public function searchp(Request $req)
    {
        $categories = Category::where('name', 'like', '%' . $req->key . '%')->get();

        return view('admin.product.category.index', compact('categories'));
    }
}

