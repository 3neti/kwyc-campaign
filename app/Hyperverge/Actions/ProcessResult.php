<?php

namespace App\Hyperverge\Actions;

use App\Hyperverge\Events\ResultProcessed;
use App\Hyperverge\Events\ResultRetrieved;
use App\Hyperverge\Pipes\PersistExtractedFields;
use App\Models\Checkin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Pipeline\Pipeline;
use Lorisleiva\Actions\Concerns\AsAction;

class ProcessResult implements ShouldQueue
{
    use AsAction;

    public function __construct(protected Pipeline $pipeline) {}

    public function handle(Checkin $checkin)
    {
        $checkin = $this->pipeline
            ->send($checkin)
            ->through([
                PersistExtractedFields::class
            ])//TODO: add processes e.g., addIdImage, addSelfieImage
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
