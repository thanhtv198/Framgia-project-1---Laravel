<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Manufacture;
use App\Models\Comment;
use Auth;
use DB;
use App\Http\Requests\CommentRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;

class ProductController extends Controller
{
    use Rateable;

    public function getDetailProduct($id)
    {
        try {
            $product = Product::findOrFail($id);
            if($product->status == 1){
                $images = $product->images;
                $categories = Category::all();
                $manufactures = Manufacture::all();
                $comments = Comment::getById($product->id);
                $views = $product->views;
                Product::updateViews($id, $views);

                return view('site.product.detail', compact('product', 'categories', 'manufactures', 'images', 'comments', 'replies'));
            }

            return view('site.404');
        } catch (ModelNotFoundException $e) {
            return view('site.404');
        }
    }

    public function postAddComment(CommentRequest $request)
    {
        $request->merge([
            'user_id' => Auth::user()->id,
            'status' => 1,
        ]);
        Comment::create($request->all());

        return back();
    }

    public function postAddReply(CommentRequest $request)
    {
        $request->merge([
            'user_id' => Auth::user()->id,
            'status' => 1,
            'parent_id' => $request->comment_id,
        ]);
        Comment::create($request->all());

        return back();
    }

    public function rating(Request $request, $id)
    {
        if (!$request->rate) {
            return back()->with('message', 'You have to select your rating');
        }
        try {
            $pro = Product::findorFail($id);
            $userId = auth()->user()->id;
            $collect = DB::table('ratings')->where('user_id', $userId)->where('rateable_id', $id)->first();
            if ($collect == null) {
                $rating = new \willvincent\Rateable\Rating;
                $rating->rating = $request->rate;
                $rating->user_id = $userId;
                $pro->ratings()->save($rating);
            }

            DB::table('ratings')->where('user_id', $userId)->where('rateable_id', $id)->update([
                'rating' => $request->rate,
            ]);
            return back();
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
    }
}

