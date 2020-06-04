<?php

namespace App\Providers;

use App\Http\ViewComposers\HeaderCartComposer;
use App\Services\Cart\Cart;
use App\Services\Cart\Cost\CalculatorInterface;
use App\Services\Cart\Cost\SimpleCost;
use App\Services\Cart\Storage\SessionStorage;
use App\Services\Cart\Storage\StorageInterface;
use Illuminate\Contracts\Foundation\Application;
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
        $this->app->bind(StorageInterface::class, function () {
            return new SessionStorage('cart');
        });

        $this->app->bind(CalculatorInterface::class, SimpleCost::class);

        $this->app->singleton(Cart::class, function (Application $app) {
            return new Cart($app->make(StorageInterface::class),
                $app->make(CalculatorInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.app', HeaderCartComposer::class);
    }
}
