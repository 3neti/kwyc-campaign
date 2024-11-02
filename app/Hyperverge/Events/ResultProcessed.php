<?php

namespace App\Hyperverge\Events;

use App\Models\Checkin;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Class ResultRetrieved
 *
 * @property Checkin $checkin
 */
class ResultProcessed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Checkin $checkin){}

    public function broadcastOn(): array
    {
        return [
            new Channel('checkin.'. $this->checkin->id),
            new Channel('campaign.' . $this->checkin->campaign->id),
        ];
    }

    public function broadcastAs(): string
    {
        return 'result.processed';
    }

    public function broadcastWith(): array
    {
        return [
            'transactionId' => $this->checkin->id,
        ];
    }
}
