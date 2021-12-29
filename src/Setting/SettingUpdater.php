<?php

namespace Vgplay\LaravelCachedSetting\Setting;

use Illuminate\Support\Collection;
use Vgplay\LaravelCachedSetting\Setting\Setting;

class SettingUpdater
{
    public function update(Collection $settings, array $configs)
    {
        foreach ($settings as $setting) {
            $content = $this->getContentBasedOnType($setting, $configs);

            if ($setting->type == 'image' && $content == null) {
                continue;
            }

            if ($setting->type == 'file' && $content == null) {
                continue;
            }

            $this->performUpdateSetting($setting, $content);
        }
    }

    protected function performUpdateSetting(Setting $setting, $config)
    {
        $setting->value = $config;
        $setting->save();
    }

    protected function getContentBasedOnType(Setting $setting, $configs)
    {
        switch ($setting->data_type) {
            case 'checkbox':
                return array_key_exists($setting->key, $configs);
            case 'file':
            case 'image':
                return array_key_exists($setting->key, $configs)
                    ? $configs[$setting->key]
                    : null;
            case 'list':
                return array_key_exists($setting->key, $configs)
                    ? $configs[$setting->key]
                    : [];
            default:
                return array_key_exists($setting->key, $configs)
                    ? $configs[$setting->key]
                    : '';
        }
    }
}
