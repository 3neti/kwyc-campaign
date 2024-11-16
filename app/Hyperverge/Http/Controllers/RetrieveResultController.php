<?php

namespace App\Hyperverge\Http\Controllers;

use App\Hyperverge\Exceptions\HypervergeException;
use App\Hyperverge\Enums\HypervergeResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RetrieveResultController extends Controller
{
    public function __invoke(Request $request): string
    {
        $status = $request->get('status');
        $transactionId = $request->get('transactionId');
        $response = HypervergeResponse::tryFrom($status);
        return match ($response) {
            HypervergeResponse::AUTO_APPROVED => $response->value,
            default => throw HypervergeException::createFromResponse($response, $transactionId)
        };
    }
}
