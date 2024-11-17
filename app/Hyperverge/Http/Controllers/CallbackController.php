<?php

namespace App\Hyperverge\Http\Controllers;

use App\Hyperverge\Exceptions\HypervergeException;
use App\Hyperverge\Events\CallbackAutoApproved;
use App\Hyperverge\Enums\HypervergeResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkin;
use App\Hyperverge\Actions\ReceiveCallback;

class CallbackController extends Controller
{
    public function __invoke(Request $request)
    {
        $status = $request->get('status');
        $transactionId = $request->get('transactionId');
        $response = ReceiveCallback::run($transactionId, $status);
//        $response = HypervergeResponse::tryFrom($status);
        return match ($response) {
            HypervergeResponse::AUTO_APPROVED => (function () use ($transactionId) {
//                $checkin = Checkin::findOrFail($transactionId);
//                CallbackAutoApproved::dispatch($checkin);

                return redirect()->to(route('checkin-contact.show', $transactionId));
            })(),
            default => throw HypervergeException::createFromResponse($response, $transactionId)
        };
    }
}
