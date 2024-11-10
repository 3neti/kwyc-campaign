<?php

namespace App\Actions;

use App\Models\Checkin;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Hyperverge\Actions\GenerateURL;
use Lorisleiva\Actions\ActionRequest;
use App\Models\Campaign;

class AutoCampaignCheckin
{
    use AsAction;

    /**
     * @throws \Throwable
     */
    public function handle(Campaign $campaign): Checkin
    {
        $checkin = $campaign->checkins()->create();
        $checkin->updateOrFail([
            'url' => GenerateURL::run($checkin->id)
        ]);

        return $checkin;
    }

    public function asController(ActionRequest $request, Campaign $campaign)
    {
        $checkin = $this->handle($campaign);

        return inertia()->location($checkin->url);
    }
}
