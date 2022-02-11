<?php

namespace Vgplay\LaravelCachedSetting;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Vgplay\LaravelCachedSetting\Actions\ListSetting;

class CachedSettingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'vgplay');
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
