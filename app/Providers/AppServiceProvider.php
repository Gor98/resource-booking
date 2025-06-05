<?php

namespace App\Providers;

use App\Modules\Auth\Contracts\AuthUserServiceContract;
use App\Modules\Auth\Services\AuthUserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            AuthUserServiceContract::class,
            AuthUserService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
