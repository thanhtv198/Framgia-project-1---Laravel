<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController;
use App\Models\Product;
use App\Models\Category;
use App\Models\Manufacture;
use App\Models\Respond;
use App\Models\News;
use App\Models\User;
use DB;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $product = count(Product::getAll());

        $news = count(News::all());

        $member = count(User::all());

        $respond = count(Respond::all());

        $slide = count(Slide::all());

        $products = Product::productCheck()->get();

        return view('admin.home', compact('product', 'news', 'member', 'respond', 'products', 'slide'));
    }
}

