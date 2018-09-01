<?php

namespace App\Http\Controllers\Site;

use App\Models\Local;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Auth;
use App\Http\Requests\OrderRequest;
use Notification;

class CartController extends Controller
{
    public function viewCart()
    {
        $cart = Cart::content();

        return view('site.cart.cart', compact('cart'));
    }

    public function getAddCart($id)
    {
        try {
            $product = Product::getById($id);
            if ($product->promotion == 0) {
                $price = $product->price;
            } else {
                $price = $product->price - $product->promotion;
            }
            Cart::add(array('id' => $id, 'name' => $product->name, 'qty' => 1, 'price' => $price));

            return redirect()->back()->with('sucess', trans('common.with.add_cart_success'));
        } catch (ModelNotFoundException $e) {
            return view('site.404');
        }
    }

    public function updateCart(Request $request)
    {
        $carts = Cart::content();
        foreach ($carts as $row) {
            $id = $row->rowId;
            $qty = $request->input('qty' . $id);
            Cart::update($id, $qty);
        }

        return redirect('cart/cart');
    }

    public function deleteCart($id)
    {
        Cart::remove($id);

        return redirect()->route('cart');
    }

    public function checkOut()
    {
        $local = Local::pluck('name', 'id');

        return view('site.cart.checkout', compact('local', 'city'));
    }

    public function postCheckOut(OrderRequest $request)
    {
        $totalItems = Cart::count();
        $content = Cart::content();
        $total = Cart::subtotal();
        $totalMoney = str_replace(',', '', $total);
        if ($totalItems <= 0) {
            redirect()->back()->with('message', trans('common.with.order_empty'));
        }
        if (!Auth::user()) {
            $request->merge([
                'buyer_id' => 0,
                'total' => $totalMoney,
                'status' => 0,
            ]);
        } else {
            $request->merge([
                'buyer_id' => Auth::user()->id,
                'total' => $totalMoney,
                'remove' => 0,
            ]);
        }
        $order = Order::create($request->all());
        foreach ($content as $key => $value) {
            $product = Product::findOrFail($value->id);
            $orderdetail = OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $value->id,
                'user_id' => $product->user_id,
                'quantity' => $value->qty,
                'status' => 0,
                'remove' => 0,
                'price' => $value->price,
            ]);
            Notification::send($product->user, new \App\Notifications\OrderNotification($order, $orderdetail));
        }
        Cart::destroy();

        return redirect()->route('home_page')->with('success', trans('common.with.order_success'));
    }

    public function notification(){
        return Auth::user()->unreadNotifications;
    }
}

