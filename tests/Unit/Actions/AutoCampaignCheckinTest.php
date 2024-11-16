<?php

use App\Hyperverge\Actions\GenerateURL;
use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use App\Models\{Agent, Campaign, Checkin};
use App\Actions\AutoCampaignCheckin;
use Illuminate\Support\Facades\Http;
use App\Hyperverge\Hyperverge;

uses(RefreshDatabase::class, WithFaker::class);

beforeEach(function () {
    $this->targetUrl = 'https://google.com';
    Http::fake([
        app(Hyperverge::class)->url() => Http::response(['result' => ['startKycUrl' => $this->targetUrl]], 200)
    ]);
});

dataset('campaign', function () {
    return [
        [fn() => tap(Campaign::factory()->create(), function ($campaign) {
            $campaign->enabled = true;
            $campaign->save();
        })]
    ];
});

test('auto campaign checkin action accepts campaign', function (Campaign $campaign) {
    $action = app(AutoCampaignCheckin::class);
    $checkin = $action->run($campaign);
    expect($checkin)->toBeInstanceOf(Checkin::class);
    expect($checkin->url)->toBeUrl();
})->with('campaign');

test('auto campaign checkin end points accepts campaign happy path', function (Campaign $campaign) {
    $url = route('campaign-checkin', ['campaign' => $campaign->id]);
    $response = $this->get($url);
    $checkin = Checkin::first();
    expect($response->status())->toBe(302);
    expect($response->getTargetUrl())->toBe($this->targetUrl);
    expect($response->getTargetUrl())->toBe($checkin->url);
})->with('campaign');

test('auto campaign checkin end points accepts campaign - disabled', function (Campaign $campaign) {
    $campaign->enabled = false;
    $campaign->save();
    $url = route('campaign-checkin', ['campaign' => $campaign->id]);
    $response = $this->get($url);
    $checkin = Checkin::first();
    expect($checkin)->toBeNull();
    expect($response->status())->toBe(302);
    expect($response->getTargetUrl())->toBe(route('campaign-disabled'));
})->with('campaign');
