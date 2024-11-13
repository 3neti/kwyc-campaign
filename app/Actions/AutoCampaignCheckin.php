<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Hyperverge\Actions\GenerateURL;
use Lorisleiva\Actions\ActionRequest;
use App\Models\{Campaign, Checkin};

class AutoCampaignCheckin
{
    use AsAction;

    /**
     * @throws \Throwable
     */
    public function handle(Campaign $campaign,  array $inputs = []): Checkin
    {
        $checkin = $campaign->checkins()->create();
        $checkin->updateOrFail([
            'url' => GenerateURL::run($checkin),
            'inputs' => $inputs
        ]);

        return $checkin;
    }

    /**
     * @throws \Throwable
     */
    public function asController(ActionRequest $request, Campaign $campaign): \Symfony\Component\HttpFoundation\Response
    {
        $checkin = $this->handle($campaign);

        return inertia()->location($checkin->url);
    }
}
