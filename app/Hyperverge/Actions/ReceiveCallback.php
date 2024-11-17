<?php

namespace App\Hyperverge\Actions;

use App\Hyperverge\Events\CallbackAutoApproved;
use App\Hyperverge\Enums\HypervergeResponse;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\Checkin;

class ReceiveCallback
{
    use AsAction;

    public function handle(string $transactionId, string $status): HypervergeResponse
    {
        $checkin = Checkin::findOrFail($transactionId);
        $response = HypervergeResponse::from($status);
        CallbackAutoApproved::dispatchIf(HypervergeResponse::AUTO_APPROVED == $response, $checkin);

        return $response;
    }
}
