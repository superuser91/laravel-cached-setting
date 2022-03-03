<?php

namespace Vgplay\LaravelCachedSetting;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Vgplay\LaravelCachedSetting\Setting\Setting;

class CachedSettingServiceProvider extends ServiceProvider
{
    /**
     * Get the policies defined on the provider.
     *
     * @return array
     */
    public function policies()
    {
        return [
            Setting::class => config('vgplay.settings.policy'),
        ];
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'vgplay');
    }

    public function boot()
    {
        $this->registerPolicies();
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'vgplay');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        foreach (glob(__DIR__ . '/Helper/*.php') as $filename) {
            require_once $filename;
        }

        $this->publishes([
            __DIR__ . '/../resources/assets/vendor' => public_path('vendor')
        ], 'assets');
    }
}
