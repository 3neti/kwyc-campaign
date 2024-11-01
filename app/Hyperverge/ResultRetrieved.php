<?php

namespace App\Hyperverge;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Queue\SerializesModels;
use App\Models\Checkin;

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
