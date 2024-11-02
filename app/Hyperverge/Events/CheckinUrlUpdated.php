<?php

namespace App\Hyperverge\Events;

use App\Models\Checkin;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Class CheckinUrlUpdated
 *
 * @property Checkin $checkin
 */
class CheckinUrlUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Checkin $checkin){}
}
