<?php

use Illuminate\Support\Facades\Route;
use Vgplay\LaravelCachedSetting\Actions\ListSetting;
use Vgplay\LaravelCachedSetting\Actions\UpdateSetting;

Route::middleware('web')->group(function () {
    Route::group([
        'prefix' => config('vgplay.settings.prefix'),
        'middleware' => config('vgplay.settings.middleware')
    ], function () {
        Route::get('/{group?}', [ListSetting::class, 'index'])->name('settings.index');
        Route::match(['PUT', 'PATCH'], '/{group?}', [UpdateSetting::class, 'update'])->name('settings.update');
        Route::post('/', [ListSetting::class, 'index'])->name('settings.store');
        Route::delete('/{setting:key}', [ListSetting::class, 'index'])->name('settings.destroy');
    });
});
