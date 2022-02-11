<?php

namespace Vgplay\LaravelCachedSetting\Actions;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class CreateSetting
{
    use AuthorizesRequests;

    public function store(Request $request)
    {
        $this->authorize(config('vgplay.settings.permissions.create'));


    }
}
