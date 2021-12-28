<?php

namespace App\Providers;

use App\Contracts\Repository\ProductRepositoryContract;
use App\Contracts\Repository\UserRepositoryContract;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductRepositoryContract::class, ProductRepository::class);
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
