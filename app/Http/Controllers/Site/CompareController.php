<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function index()
    {
        $items = Cart::instance('compare')->content();
        $count = Cart::instance('compare')->count();
        if ($count == 0) {
            return redirect()->route('home_page')->with('message', trans('common.with.more_compare'));
        }
        foreach ($items as $row) {
            $products[] = Product::findORFail($row->id);
            $rowId[] = $row->rowId;
        }
        $image0 = $products[0]->images->first();
        if ($count < 2) {
            return view('site.compare.compare_one', compact('products', 'rowId', 'image0'));
        }
        $image1 = $products[1]->images->first();

        return view('site.compare.compare', compact('products', 'rowId', 'image0', 'image1'));
    }

    public function addToCompare($id)
    {
        $product = Product::getById($id);
        $count = Cart::instance('compare')->count();
        if (Cart::instance('compare')->count() >= 2) {
            return redirect()->back()->with('message', trans('common.with.3_product'));
        }
        if ($count == 1) {
            $items = Cart::instance('compare')->content();
            foreach ($items as $row) {
                if ($id == $row->id) {
                    return 1;
                }
            }
        }
        Cart::instance('compare')->add(array('id' => $id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price));

        return redirect()->back()->with('sucess', trans('common.with.add_cart_success'));
    }

    public function delete($id)
    {
        Cart::instance('compare')->remove($id);

        return redirect()->route('home_page')->with('message', trans('common.with.more_compare'));
    }
}

