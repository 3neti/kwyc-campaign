<?php

use App\Notifications\CheckinFeedback;

return [
    'seeds' => [
        'user' => [
            'system' => [
                'name' => env('SYSTEM_USER_NAME',  'Lester B. Hurtado'),
                'email' => env('SYSTEM_USER_EMAIL',  '3neti@lyflyn.net'),
                'mobile_country' => env('SYSTEM_USER_MOBILE_COUNTRY', 'PH'),
                'mobile' => env('SYSTEM_USER_MOBILE', '+639173011987'),
                'password' => $password = env('SYSTEM_USER_PASSWORD', '#Password1'),
                'password_confirmation' => $password,
                'role' => env('SYSTEM_USER_ROLE', 'admin'),
                'type' => 'system'
            ],
        ],
    ],
    'channels' => [
        'default' => array_filter(explode(',', env('DEFAULT_CHANNELS', 'database'))),
        'allowed' => array_filter(explode(',', env('ALLOWED_CHANNELS', 'database,slack'))),
        CheckinFeedback::class => array_filter(explode(',', env('CHECKIN_FEEDBACK_CHANNELS', 'mail,engage_spark,webhook,slack'))),
    ],
];
