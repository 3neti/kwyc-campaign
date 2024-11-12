<?php

namespace App\Hyperverge\Actions;

use App\Hyperverge\Enums\Action as HypervergeAction;
use Illuminate\Http\Client\ConnectionException;
use App\Hyperverge\Events\ResultRetrieved;
use Illuminate\Support\Carbon;
use Lorisleiva\Actions\Concerns\AsAction;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use App\Hyperverge\Hyperverge;
use App\Models\Checkin;

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
                'data' => json_decode($response->body(), true),
                'valid_until' => $this->getValidUntil(now())
            ]);
            $checkin->data_retrieved = true;
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

    protected function getValidUntil(Carbon $datetime): Carbon
    {
        $increment = $increment ?? config('kwyc-campaign.defaults.checkin.valid_until_increment');

        return $datetime->add($increment);
    }
}
