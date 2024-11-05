<?php

namespace App\Providers;

use NotificationChannels\Webhook\WebhookChannel;
use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Notification::resolved(function (ChannelManager $service) {
            $service->extend('webhook', function ($app) {
                return new WebhookChannel($app->make(Client::class));
            });
        });
    }

    public function boot(): void
    {
        //
    }
}
