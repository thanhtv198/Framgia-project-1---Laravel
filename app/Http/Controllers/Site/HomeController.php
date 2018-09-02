<?php

namespace App\Http\Controllers\Site;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthController;
use App\Models\User;
use App\Models\Product;
use App\Http\Requests\UserRequest;
use App\Http\Requests\SignInRequest;
use App\Models\News;
use App\Models\Local;
use Cart;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $new_products = Product::getProduct();

        $viewsProducts = Product::views();

        return view('site.index', compact('new_products', 'viewsProducts'));
    }

    /**
     * @param Request $request
     * @return array
     */
    public function getKey(Request $request)
    {
        $products = Product::search($request->key);

        foreach ($products as $row) {
            $data[] = $row->name;
        }

        return $data;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $key1 = $request->key;
        $key = str_replace('__', '/', substr($key1, 0, 10));;

        $users = User::search($key);

        if ($users != null) {
            foreach ($users as $list) {
                $userId[] = $list['id'];
            }

            if (($userId) != null) {
                $products = Product::searchCommon($key, $userId);
            }
        } else {
            $products = Product::searchNameDes($key);
        }

        if ($products == null) {
            $products = array();

            return view('site.result', compact('products'));
        }

        return view('site.result', compact('products'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function searchPrice(Request $request)
    {
        $from = 1000000 * ($request->from);
        $to = 1000000 * ($request->to);

        if ($from && $to) {
            $products = Product::priceBetween($from, $to);
        } else if ($from && !$to) {
            $products = Product::priceFrom($from);
        } else if (!$from && $to) {
            $products = Product::priceTo($to);
        } else {
            return back();
        }

        return view('site.result', compact('products'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function searchAddress(Request $request)
    {
        $id = $request->id;

        if (!$id) {
            return redirect()->back()->with('message', 'Choose location');
        }

        $local = Local::where('id', $id)->first();

        if ($local == null) {
            $products = array();

            return view('site.result', compact('products'));
        }

        $users = User::where('local_id', $id)->get();

        if (count($users) == 0) {
            $products = array();

            return view('site.result', compact('products'));
        }

        foreach ($users as $list) {
            $userId[] = $list->id;
        }

        $products = Product::getByAddress($userId);

        return view('site.result', compact('products'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCategory($id)
    {
        $products = Product::getCategory($id);

        return view('site.result', compact('products'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getManufacture($id)
    {
        $products = Product::getManufacture($id);

        return view('site.result', compact('products'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newDetail($id)
    {
        $news = News::findOrFail($id);

        return view('site.news', compact('news'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSignUp()
    {
        $local = Local::pluck('name', 'id');

        return view('site.account.sign_up', compact('local'));
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSignUp(UserRequest $request)
    {
        $request->merge([
            'level_id' => 3,
            'password' => bcrypt($request->password),
            'remove' => 0,
        ]);

        User::create($request->all());

        return redirect('signin')->with('success', trans('common.login.sign_up_success'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSignIn()
    {
        return view('site.account.sign_in');
    }

    /**
     * @param SignInRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSignIn(SignInRequest $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            Cart::destroy();

            Cart::instance('compare')->destroy();

            return redirect('/')->with('success', trans('common.login.success'));
        } else {
            return redirect()->back()->with('message', trans('common.login.failed'));
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logOut()
    {
        Auth::logout();
        Cart::destroy();
        Cart::instance('compare')->destroy();

        return redirect('signin');
    }
}

