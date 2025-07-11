<?php

namespace App\Providers;

use App\Modules\Auth\Contracts\AuthUserServiceContract;
use App\Modules\Auth\Models\User;
use App\Modules\Auth\Observers\UserObserver;
use App\Modules\Auth\Services\AuthUserService;
use App\Modules\Booking\Contracts\BookingServiceContract;
use App\Modules\Booking\Services\BookingService;
use App\Modules\Resource\Contracts\ResourceServiceContract;
use App\Modules\Resource\Services\ResourceService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthUserServiceContract::class, AuthUserService::class);
        $this->app->bind(ResourceServiceContract::class, ResourceService::class);
        $this->app->bind(BookingServiceContract::class, BookingService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        User::observe(UserObserver::class);
    }
}
