<?php

namespace App\Hyperverge\Events;

use App\Models\Checkin;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Class ResultRetrieved
 *
 * @property Checkin $checkin
 */
class ResultRetrieved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Checkin $checkin){}
}
