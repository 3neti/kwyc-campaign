<?php

use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use App\Models\{Agent, Campaign, Organization};
use App\Actions\AutoCampaignCheckin;

uses(RefreshDatabase::class, WithFaker::class);

test('auto campaign checkin action accepts campaign', function () {
    $campaign = Campaign::factory()->create();
    $action = app(AutoCampaignCheckin::class);
    expect($action->run($campaign))->toBe($campaign->name);
});

test('auto campaign checkin end points accepts campaign', function () {
    $campaign = Campaign::factory()->create();
    $url = route('campaign-checkin', ['campaign' => $campaign->id]);
    $response = $this->get($url);
    expect($response->status())->toBe(200);
});
