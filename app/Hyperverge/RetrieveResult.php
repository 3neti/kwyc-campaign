<?php

namespace App\Hyperverge;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\Checkin;
use App\Hyperverge\Action as HypervergeAction;

/**
 * Class RetrieveResult
 *
 * @property Hyperverge $hyperverge
 */
class RetrieveResult
{
    use AsAction;

    public Hyperverge $hyperverge;

    public function __construct(Hyperverge $hyperverge)
    {
        $this->hyperverge = $hyperverge->setAction(HypervergeAction::Result);
    }

    public function handle(Checkin $checkin)
    {
        $success = false;

        $response = Http::withHeaders(headers: $this->hyperverge->headers())->post(
            url: $this->hyperverge->url(),
            data: $this->hyperverge->body($checkin->id)
        );
        if ($response->successful()) {
            $checkin->update([
                'data' => $response->body(),
                'data_retrieved_at' => now()
            ]);
            $checkin->save();
            ResultRetrieved::dispatch($checkin);
            $success = true;
        }

        return $success;
    }

    /**
     * @throws ConnectionException
     */
    protected function getHypervergeResponse(string $transactionId): PromiseInterface|Response
    {

        return Http::withHeaders(headers: $this->hyperverge->headers())
            ->post(
                url: $this->hyperverge->url(),
                data: $this->hyperverge->body($transactionId)
            );
    }
}
