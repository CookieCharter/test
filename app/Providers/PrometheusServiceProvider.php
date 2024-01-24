<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Spatie\Prometheus\Facades\Prometheus;

class PrometheusServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        Prometheus::addGauge('my_gauge', function () {
            return 123.45;
        });

        Prometheus::addGauge('User count')
            ->value(fn() => User::count());
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
