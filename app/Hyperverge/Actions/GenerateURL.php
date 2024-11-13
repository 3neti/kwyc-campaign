<?php

namespace App\Hyperverge\Actions;

use Illuminate\Http\Client\ConnectionException;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Hyperverge\Events\URLGenerated;
use Illuminate\Support\Facades\Http;
use App\Hyperverge\Hyperverge;
use App\Models\Checkin;

class GenerateURL
{
    use AsAction;

    public function __construct(public Hyperverge $hyperverge){}

    /**
     * @throws ConnectionException
     */
    public function handle(Checkin|string $checkin, string $workflowId = null)
    {
        $transactionId = $checkin instanceof Checkin ? $checkin->id : $checkin;
        $response = Http::withHeaders(headers: $this->hyperverge->headers())
            ->post(
                url: $this->hyperverge->url(),
                data: $this->hyperverge->setWorkflowId($workflowId)->body($transactionId)
            );

        $url = null;
        if ($response->successful()) {
            URLGenerated::dispatch($transactionId, $url = $response->json('result.startKycUrl'));
        }

        return $url;
    }
}
