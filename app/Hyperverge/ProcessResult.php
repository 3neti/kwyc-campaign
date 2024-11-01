<?php

namespace App\Hyperverge;

use Illuminate\Contracts\Queue\ShouldQueue;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Pipeline\Pipeline;
use App\Models\Checkin;

class ProcessResult implements ShouldQueue
{
    use AsAction;

    public function __construct(protected Pipeline $pipeline) {}

    public function handle(Checkin $checkin)
    {
        $checkin = $this->pipeline
            ->send($checkin)
            ->through([])
            ->thenReturn();
        $checkin->save();
        ResultProcessed::dispatch($checkin);

        return true;
    }

    public function asJob(Checkin $checkin): void
    {
        $this->handle($checkin);
    }

    public function asListener(ResultRetrieved $event): void
    {
        self::dispatch($event->checkin);
    }
}
