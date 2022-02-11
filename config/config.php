<?php

return [
    'settings' => [
        'prefix' => '/admin/settings/',
        'middleware' => ['auth:admin'],
        'permissions' => [
            'index' => 'settings.index',
            'create' => 'settings.create',
            'update' => 'settings.update',
            'delete' => 'settings.delete'
        ]
    ]
];
