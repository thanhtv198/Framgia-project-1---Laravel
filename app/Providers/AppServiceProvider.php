<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Categoies;
use App\Models\Manufacture;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('site.layouts.header', function ($view) {
            $categoriesHeader = DB::table('categories')->get();
            $view->with('categoriesHeader', $categoriesHeader);
        });
        view()->composer('site.layouts.header', function ($view1) {
            $manufacturesHeader = DB::table('manufactures')->get();
            $view1->with('manufacturesHeader', $manufacturesHeader);
        });
        view()->composer('site.layouts.sidebar', function ($view2) {
            $newsSidebar = DB::table('news')->orderBy('id', 'DESC')->take(config('app.paginateNews'))->get();
            $view2->with('newsSidebar', $newsSidebar);
        });
        view()->composer('site.layouts.banner', function ($view3) {
            $slideSidebar = DB::table('slides')->orderBy('id', 'DESC')->take(config('app.paginateNews'))->get();
            $view3->with('slideSidebar', $slideSidebar);
        });
        view()->composer('site.layouts.sidebar', function ($view4) {
            $address = DB::table('locals')->pluck('name', 'id');
            $view4->with('address', $address);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

