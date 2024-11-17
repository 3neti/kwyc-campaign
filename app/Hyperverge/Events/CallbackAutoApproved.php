<?php

namespace App\Hyperverge\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Checkin;

/**
 * Class CallbackAutoApproved
 *
 * @property Checkin $checkin
 */
class CallbackAutoApproved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Checkin $checkin){}
}
