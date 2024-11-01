<?php

namespace App\Hyperverge;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Queue\SerializesModels;

/**
 * Class URLGenerated
 *
 * @property string $transactionId
 * @property string $url
 */
class URLGenerated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public string $transactionId, public string $url){}

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('checkin.'. $this->transactionId),
        ];
    }

    public function broadcastAs(): string
    {
        return 'url.generated';
    }
}
