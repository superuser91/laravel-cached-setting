<?php

namespace Vgplay\LaravelCachedSetting\Actions;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Vgplay\LaravelCachedSetting\Setting\Setting;
use Vgplay\LaravelCachedSetting\Setting\SettingUpdater;

class UpdateSetting
{
    use AuthorizesRequests;

    public function update(Request $request, SettingUpdater $settingUpdater, $group = null)
    {
        $this->authorize('update', Setting::class, $group);

        $settings = Setting::fromCache()->all()
            ->where('is_hidden', false)
            ->when($group, function ($q) use ($group) {
                return $q->where('group', $group);
            });

        try {
            $settingUpdater->update($settings, $request->all());
            session()->flash('status', 'Cập nhật thành công');
            return redirect(route('settings.index', $group));
        } catch (ValidationException $e) {
            session()->flash('status', $e->getMessage());
            return back()->withInput()->withErrors($e->validator);
        } catch (\Exception $e) {
            session()->flash('status', $e->getMessage());
            return back()->withInput();
        }
    }
}
