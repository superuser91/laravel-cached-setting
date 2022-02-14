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
            ->where('is_hidden', false)
            ->when($group, function ($q) use ($group) {
                return $q->where('group', $group);
            });

        return view('vgplay::settings.index', compact('settings'));
    }
}
