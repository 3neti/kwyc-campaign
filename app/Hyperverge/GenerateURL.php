<?php

namespace App\Hyperverge;

use Illuminate\Http\Client\ConnectionException;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Support\Facades\Http;

class GenerateURL
{
    use AsAction;

    public function __construct(public Hyperverge $hyperverge){}

    /**
     * @throws ConnectionException
     */
    public function handle(string $transactionId, string $workflowId = null)
    {
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
