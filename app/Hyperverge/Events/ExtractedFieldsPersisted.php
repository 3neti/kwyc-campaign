<?php

namespace App\Hyperverge\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Checkin;

/**
 * Class ResultRetrieved
 *
 * @property Checkin $checkin
 */
class ExtractedFieldsPersisted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Checkin $checkin){}
}
