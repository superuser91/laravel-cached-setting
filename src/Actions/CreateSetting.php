<?php

namespace Vgplay\LaravelCachedSetting\Actions;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Vgplay\LaravelCachedSetting\Setting\Setting;

class CreateSetting
{
    use AuthorizesRequests;

    public function store(Request $request)
    {
        $this->authorize('create', Setting::class, $request['group']);
    }
}
