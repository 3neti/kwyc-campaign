<?php

namespace App\Hyperverge\Actions;

use App\Hyperverge\Events\CheckinUrlUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Hyperverge\Events\URLGenerated;
use App\Models\Checkin;

class UpdateCheckinUrl implements ShouldQueue
{
    use AsAction;

    public function handle(string $transactionId, string $url): bool
    {
        return (bool) optional(Checkin::find($transactionId), function ($checkin) use ($url) {
            if ($updated = $checkin->update(compact('url')))
                CheckinUrlUpdated::dispatch($checkin);

            return $updated;
        });
    }

    public function asJob(string $transactionId, string $url): void
    {
        $this->handle($transactionId, $url);
    }

    public function asListener(URLGenerated $event): void
    {
        self::dispatch($event->transactionId, $event->url);
    }
}
