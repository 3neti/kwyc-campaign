<?php

namespace App\Hyperverge;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\Channel;
use App\Models\Checkin;

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
