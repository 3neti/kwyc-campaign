<?php

namespace App\Hyperverge;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Hyperverge\Events\{CallbackAutoApproved, ResultRetrieved, URLGenerated};
use App\Hyperverge\Actions\{ProcessResult, RetrieveResult, UpdateCheckinUrl};
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
        Event::listen(events: CallbackAutoApproved::class , listener: RetrieveResult::class);
        Event::listen(events: ResultRetrieved::class , listener: ProcessResult::class);
    }
}
