<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\VkApi;
use Config;

/**
 * Class VkServicePrivider
 * @package App\Providers
 */
class VkServicePrivider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('vk_service', function () {
            return new VkApi;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['vk_service'];
    }
}
