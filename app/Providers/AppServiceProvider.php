<?php

namespace App\Providers;

use App\Contracts\Services\ProductServiceContract;
use App\Contracts\Services\UserServiceContract;
use App\Services\ProductService;
use App\Services\UserService;
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
        $this->app->bind(ProductServiceContract::class, ProductService::class);
        $this->app->bind(UserServiceContract::class, UserService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
