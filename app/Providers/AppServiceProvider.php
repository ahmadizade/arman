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
            $sss = Store::inRandomOrder()->limit(5)->get();
            $view->with('sss',response()->json($sss));
        });


    }
}
