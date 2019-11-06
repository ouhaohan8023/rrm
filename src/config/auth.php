<?php

return [
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => \OhhInk\Rrm\Model\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],
];
