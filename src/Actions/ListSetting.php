<?php

namespace Vgplay\LaravelCachedSetting\Actions;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Vgplay\LaravelCachedSetting\Setting\Setting;

class ListSetting
{
    use AuthorizesRequests;

    public function index(Request $request, $group = null)
    {
        $this->authorize(config('vgplay.settings.permission.index'));

        $settings = Setting::fromCache()->all()
            ->when($group, function ($q) use ($group) {
                $q->where('group', $group);
            })
            ->where('is_hidden', false);

        return view('vgplay::settings.index', compact('settings'));
    }
}
