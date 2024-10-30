<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;
use App\Models\Campaign;

class AutoCampaignCheckin
{
    use AsAction;

    public function handle(Campaign $campaign)
    {
        return $campaign->name;
    }

    public function asController(ActionRequest $request, Campaign $campaign)
    {
        return $this->handle($campaign);
    }
}
