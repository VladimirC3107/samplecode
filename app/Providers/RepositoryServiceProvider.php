<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Repositories\Eloquent\EloquentProductRepository;
use App\Repositories\Contracts\Interfaces\ProductRepositoryInterface;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductRepositoryInterface::class, EloquentProductRepository::class);
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
