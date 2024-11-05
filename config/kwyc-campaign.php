<?php

use App\Notifications\CheckinFeedback;

return [
    'channels' => [
        'default' => array_filter(explode(',', env('DEFAULT_CHANNELS', 'database'))),
        'allowed' => array_filter(explode(',', env('ALLOWED_CHANNELS', 'database,slack'))),
        CheckinFeedback::class => array_filter(explode(',', env('CHECKIN_FEEDBACK_CHANNELS', 'mail,engage_spark,webhook,slack'))),
    ]
];
