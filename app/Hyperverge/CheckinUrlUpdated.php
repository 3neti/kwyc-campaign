<?php

namespace App\Hyperverge;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Queue\SerializesModels;
use App\Models\Checkin;

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
