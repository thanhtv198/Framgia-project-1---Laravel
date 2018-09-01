<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Requests\ProductRequest;
use Validator;
use App\Http\Controllers\Admin\Product\ProductController as P;
use App\Models\Product;
use App\Models\Category;
use App\Models\Manufacture;
use App\Models\Image;
use App\Models\CustomizeProduct;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SellingController extends Controller
{
    public function index()
    {
        $products = Auth::user()->products()->getAll();

        return view('site.selling.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $manufactures = Manufacture::pluck('name', 'id');

        return view('site.selling.add', compact('categories', 'manufactures'));
    }

    public function store(ProductRequest $request)
    {
        $request->merge([
            'status' => 0,
            'views' => 0,
            'remove' => 0,
            'user_id' => Auth::user()->id,
        ]);
        $product = Product::create($request->all());
        $prop = json_encode($request->property);
        $request->merge([
            'property' => $prop,
            'product_id' => $product->id,
        ]);
        CustomizeProduct::create($request->all());
        $idPro = $product->id;
        if ($request->hasFile('image')) {
            $files = $request->file('image');
            for ($i = 0; $i < count($files); $i++) {
                $image = new Image;
                $fileName = $files[$i]->getClientOriginalName();
                $image->image = $fileName;
                $image->stt = $i;
                $image->product_id = $idPro;
                $files[$i]->move(config('app.productUrl') . '/' . $idPro, $fileName);
                $image->save();
            }
        }

        return redirect()->route('sell.index')->with('success', trans('common.with.add_success'));
    }

    public function show($id)
    {
        try {
            $product = Product::findOrFail($id);

            if ($product->user->id == Auth::user()->id) {
                $categories = Category::pluck('name', 'id');
                $manufactures = Manufacture::pluck('name', 'id');
                $custom = CustomizeProduct::where('product_id', $id)->get();
                foreach ($custom as $c) {
                    $cusId[] = $c->id;
                }

                return view('site.selling.edit', compact('categories', 'manufactures', 'product', 'custom', 'cusId'));
            }

            return view('site.404');
        } catch (ModelNotFoundException $e) {
            return view('site.404');
        }
    }

    public function update($id, UpdateProductRequest $request)
    {
        try {
            $product = Product::findOrFail($id);
            $request->merge([
                'status' => $product->status,
                'views' => $product->views,
                'remove' => $product->remove,
                'user_id' => Auth::user()->id,
            ]);
            $product->update($request->all());
            $customizeProduct = $product->customizeProducts;
            $i = 0;
            foreach ($customizeProduct as $p) {
                $request->merge([
                    'product' => $id,
                    'detail' => $request->input('detail' . $i),
                ]);
                $p->update($request->all());
            }

            if ($request->property_new != null) {
                $request->merge([
                    'product_id' => $id,
                    'property' => json_encode($request->property_new),
                    'detail' => $request->detail_new,
                ]);
                CustomizeProduct::create($request->all());
            }

            $images = $product->images;
            for ($i = 0; $i < count($images); $i++) {
                if ($request->hasFile('image' . $i)) {
                    $files = $request->file('image' . $i);
                    $fileName = $files->getClientOriginalName();
                    if (file_exists(config('app.productUrl') . '/' . $id . '/' . $images[$i]['image'])) {
                        unlink(config('app.productUrl') . '/' . $id . '/' . $images[$i]['image']);
                    }
                    $files->move(config('app.productUrl') . '/' . $id, $fileName);
                    Image::updateImgProduct($id, $i, $fileName);
                }
            }

            return redirect()->route('sell.index')->with('success', trans('common.with.edit_success'));
        } catch (ModelNotFoundException $e) {
            return view('site.404');
        }
    }

    public function delete($id)
    {
        (new P())->deleteProduct($id);

        return redirect()->route('sell.index')->with('success', trans('common.with.delete_success'));
    }
}

