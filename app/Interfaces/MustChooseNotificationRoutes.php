<?php

namespace App\Interfaces;

interface MustChooseNotificationRoutes
{
    function getNotificationChannelsVia(object $notifiable): array;
}
