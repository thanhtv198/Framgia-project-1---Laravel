<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController;
use Validator;
use Carbon\Carbon;
use App\Models\Product;

class ProductController extends Controller
{
    public function getProduct()
    {
        $products = Product::getAll();

        return view('admin.product.product.index', compact('products'));
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        if (count($product->orderDetails) == 0) {
            $product->delete();
        } else {
            $product->update([
                'remove' => '1',
            ]);
        }

        return redirect('admin/product/index')->with('success', trans('common.with.delete_success'));
    }

    public function searchProduct(Request $request)
    {
        $products = Product::searchName($request->key);

        return view('admin.product.product.index', compact('products'));
    }

    public function accept($id)
    {
        Product::accept($id);
        Product::where('id', $id)->update([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }

    public function reject(Request $request)
    {
        $content = $request->reason;
        $id = $request->id;
        Product::reject($id, $content);
    }

    public function deleteManyProduct(Request $request)
    {
        if ($request->check == null) {
            return redirect()->back()->with('success', trans('common.with.delete_success'));
        }
        for ($i = 0; $i < count($request->check); $i++) {
            $product = Product::findOrFail($request->check[$i]);
            if (count($product->orderDetails) == 0) {
                $product->delete();
            } else {
                $product->update([
                    'remove' => '1',
                ]);
            }
        }

        return redirect('admin/product/index')->with('success', trans('common.with.delete_success'));
    }
}

