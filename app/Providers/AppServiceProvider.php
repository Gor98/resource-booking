<?php

namespace App\Providers;

use App\Modules\Auth\Contracts\AuthUserServiceContract;
use App\Modules\Auth\Models\User;
use App\Modules\Auth\Observers\UserObserver;
use App\Modules\Auth\Services\AuthUserService;
use App\Modules\Product\Contracts\ProductServiceContract;
use App\Modules\Product\Services\ProductService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthUserServiceContract::class, AuthUserService::class);
        $this->app->bind(ProductServiceContract::class, ProductService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        User::observe(UserObserver::class);
    }
}
