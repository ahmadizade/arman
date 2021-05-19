<?php

namespace App\Providers;

use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
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
            $category = DB::table('category')->get();
            $view->with('category',$category);
        });

        View::composer('*', function ($view) {
            $product_tag = DB::table('product_tag')->get();
            $view->with('product_tag',$product_tag);
        });

        View::composer('*', function ($view) {
            $category_variety = DB::table('category_variety')->get();
            $view->with('category_variety',$category_variety);
        });

    }
}
