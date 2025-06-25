<?php

namespace App\Helpers;

use App\Repositories\SettingRepositoryInterface;

class SettingHelper
{
    public static function get($key, $default = null)
    {
        $settingRepo = app(SettingRepositoryInterface::class);
        $setting = $settingRepo->all()->where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }
} 