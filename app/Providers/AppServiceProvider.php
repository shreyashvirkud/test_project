<?php

namespace App\Providers;

use App\Repository\ProductRepository;
use App\Repository\IProductRepository;

use Illuminate\Pagination\Paginator;

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
        
        $this->app->bind(IProductRepository::class, ProductRepository::class);
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
