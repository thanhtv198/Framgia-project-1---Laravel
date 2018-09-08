<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Requests\ProductRequest;
use Validator;
use App\Models\Product;
use App\Models\Category;
use App\Models\Manufacture;
use App\Models\Image;
use App\Models\CustomizeProduct;

class SellingController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Auth::user()->products()->getAll();

        return view('site.selling.index', compact('products'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');

        $manufactures = Manufacture::pluck('name', 'id');

        return view('site.selling.add', compact('categories', 'manufactures'));
    }

    /**
     * @param ProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

        $idPro = $product->id;

        CustomizeProduct::create($request->all());

        if ($request->hasFile('image')) {
            $files = $request->file('image');

            for ($i = 0; $i < count($files); $i++) {
                $fileName = $files[$i]->getClientOriginalName();

                $files[$i]->move(config('app.productUrl') . '/' . $idPro, $fileName);

                Image::create([
                    'image' => $fileName,
                    'stt' => $i,
                    'product_id' =>$idPro
                ]);
            }
        }

        return redirect()->route('sell.index')->with('success', trans('common.with.add_success'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
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
    }

    /**
     * @param $id
     * @param UpdateProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, UpdateProductRequest $request)
    {
        $product = Product::findOrFail($id);

        $request->merge([
            'status' => $product->status,
            'views' => $product->views,
            'remove' => $product->remove,
            'user_id' => Auth::user()->id,
        ]);

        $product->update($request->all());

        $customizeProduct = $product->customizeProducts;

        foreach ($customizeProduct as $p) {
            $request->merge([
                'product' => $id,
                'detail' => $request->input('detail' . $id),
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
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $product = Product::findOrFail($id);

        if (count($product->orderDetails) == 0) {
            $product->delete();
        } else {
            $product->update([
                'remove' => config('page.product.remove.inactive'),
            ]);
        }

        return redirect()->route('sell.index')->with('success', trans('common.with.delete_success'));
    }
}

