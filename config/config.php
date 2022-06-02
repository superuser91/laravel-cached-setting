<?php

return [
    'settings' => [
        'prefix' => '/admin/settings/',
        'middleware' => ['auth:admin'],
        'policy' => 'App\\Policies\\SettingPolicy',
        'layout' => 'layouts.app'
    ]
];
