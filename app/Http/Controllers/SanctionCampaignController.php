<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\CampaignData;
use App\Models\Campaign;

class SanctionCampaignController extends Controller
{
    public function show(Request $request, Campaign $campaign): \Inertia\Response
    {
        return inertia()->render('Landing/Show', [
            'campaign' => CampaignData::fromModel($campaign)->only('name', 'agent.name'),
            'code' => $campaign->id,
            'splash' => $campaign->splash
        ]);
    }

    public function store(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $request->session()->put(
            key: 'sanction-agree',
            value: $agree = (bool) $request->get('agree')
        );

        return $agree
            ? redirect()->intended(redirect()->intended()->getTargetUrl())
            : redirect(route('campaign-unsanctioned'));
    }
}
