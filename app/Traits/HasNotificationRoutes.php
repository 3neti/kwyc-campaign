<?php

namespace App\Traits;

trait HasNotificationRoutes
{
    public function via(object $notifiable): array
    {
        return $this->getNotificationChannelsVia($notifiable);
    }

    public function getNotificationChannelsVia(object $notifiable): array
    {
        $channels = array_intersect(array_unique(array_merge(config('kwyc-campaign.channels.default'), config('kwyc-campaign.channels')[self::class])), config('kwyc-campaign.channels.allowed'));
        logger('HasNotificationRoutes@getNotificationChannelsVia');
        logger($channels);

        return $channels;
    }
}
