<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Builder::macro('setFilters', function (array $filters = []) {
            array_walk($filters, function ($value, $scope)  {
                return $this->{str_replace("_", "", ucwords($scope, " /_"))}($value);
            });
            return $this;
        });
    }
}
