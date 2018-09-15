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
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewCart()
    {
        $cart = Cart::content();

        return view('site.cart.cart', compact('cart'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateCart(Request $request)
    {
        $carts = Cart::content();
dd($carts);
        foreach ($carts as $row) {
            $id = $row->rowId;
            $qty = $request->input('qty' . $id);

            Cart::update($id, $qty);
        }

        return redirect('cart/cart');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteCart($id)
    {
        Cart::remove($id);

        return redirect()->route('cart');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function checkOut()
    {
        $local = Local::pluck('name', 'id');

        return view('site.cart.checkout', compact('local', 'city'));
    }

    /**
     * @param OrderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
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
                'buyer_id' => config('page.buyer_id'),
                'total' => $totalMoney,
                'remove' => config('page.order.remove.active'),
            ]);
        } else {
            $request->merge([
                'buyer_id' => Auth::user()->id,
                'total' => $totalMoney,
                'remove' => config('page.order.remove.active'),
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
                'status' => config('page.order_detail.status.active'),
                'remove' => config('page.order_detail.remove.active'),
                'price' => $value->price,
            ]);

            Notification::send($product->user, new \App\Notifications\OrderNotification($order, $orderdetail));
        }

        Cart::destroy();

        return redirect()->route('home_page')->with('success', trans('common.with.order_success'));
    }

    /**
     * @return mixed
     */
    public function notification()
    {
        return Auth::user()->unreadNotifications;
    }
}

