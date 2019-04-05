<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        view()->composer('layouts.layoutMain', function($view){
            $view->with([
                'types' => \App\Models\BouquetType::all(),
                'flowerCategory' => \App\Models\FlowerCategory::all()
            ]);
        });

        view()->composer('home', function($view){
            $view->with([
                'types' => \App\Models\BouquetType::all(),
                'flowerCategory' => \App\Models\FlowerCategory::all()
            ]);
        });

        view()->composer('admin', function ($view){
            $view->with([
                'newOrders' => count(\App\Models\Order::where(['isComplete' => 0])->get()),
            ]);
        });
    }
}
