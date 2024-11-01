<?php

namespace App\Hyperverge;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class HypervergeEventServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        parent::boot();
        Event::listen(events: URLGenerated::class , listener: UpdateCheckinUrl::class);
    }
}
