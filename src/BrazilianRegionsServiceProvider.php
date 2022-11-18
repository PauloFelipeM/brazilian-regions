<?php

namespace PauloFelipeM\BrazilianRegions;

use Illuminate\Support\ServiceProvider;

class BrazilianRegionsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->publishResources();
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/brazilianregions.php',
            'brazilianregions'
        );
    }

    protected function publishResources(): void
    {
        if (!function_exists('config_path')) {
            return;
        }

        $this->publishes([
            __DIR__ . '/../config/brazilianregions.php' => config_path('brazilianregions.php'),
        ], 'config');

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
