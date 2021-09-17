<?php

namespace App\Providers;

use App\Models\BlogTag;
use App\Models\Product_tag;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
        Carbon::getWeekStartsAt(Carbon::FRIDAY);
        Carbon::getWeekEndsAt(Carbon::THURSDAY);


        View::composer('*', function ($view) {
            $contact_us = DB::table('contact')->orderBy('created_at', 'desc')->where('created_at', ">=", Carbon::today())->get();
            $view->with('contact_us',$contact_us);
        });

        View::composer('*', function ($view) {
            $allProduct = DB::table('products')->orderBy('created_at', 'desc')->where('delete', '=' ,0)->get();
            $view->with('allProduct',$allProduct);
        });

        View::composer('*', function ($view) {
            $popularity = DB::table('products')->orderBy('view')->where('delete', '=' ,0)->get();
            $view->with('popularity',$popularity);
        });

        View::composer('*', function ($view) {
            $setting = DB::table('setting')->first();
            $view->with('setting',$setting);
        });

        View::composer('*', function ($view) {
            $tagSingle = Cache::remember('tagSingle' , Carbon::now()->addMinutes(1), function (){
                return BlogTag::all()->keyBy("id");
            });
            $view->with('tagSingle', $tagSingle);
        });

        View::composer('*', function ($view) {
            $tagProduct = Cache::remember('$tagProduct' , Carbon::now()->addMinutes(1), function (){
                return Product_tag::all()->keyBy("id");
            });
            $view->with('tagProduct', $tagProduct);
        });


        View::composer('*', function ($view) {
            $category = DB::table('category')->where('delete', 0)->get();
            $view->with('category',$category);
        });

        View::composer('*', function ($view) {
            $product_tag = DB::table('product_tag')->where('delete', 0)->get();
            $view->with('product_tag',$product_tag);
        });
    }
}
