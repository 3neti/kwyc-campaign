<?php

namespace App\Hyperverge\Actions;

use App\Hyperverge\Events\{CallbackAutoApproved, ResultRetrieved};
use App\Hyperverge\Enums\Action as HypervergeAction;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Lorisleiva\Actions\Concerns\AsAction;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;
use App\Hyperverge\Hyperverge;
use App\Models\Checkin;

/**
 * Class RetrieveResult
 *
 * @property Hyperverge $hyperverge
 */
class RetrieveResult implements ShouldQueue
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

    public function asJob(Checkin $checkin): void
    {
        $this->handle($checkin);
    }

    public function asListener(CallbackAutoApproved $event): void
    {
        self::dispatch($event->checkin);
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
