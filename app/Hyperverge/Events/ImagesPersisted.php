<?php

namespace App\Hyperverge\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Checkin;

/**
 * Class ImagesPersisted
 *
 * @property Checkin $checkin
 */
class ImagesPersisted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Checkin $checkin){}
}
