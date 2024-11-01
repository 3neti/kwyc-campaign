<?php

use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use App\Models\{Agent, Campaign, Checkin, Organization};
use Illuminate\Support\Carbon;

uses(RefreshDatabase::class, WithFaker::class);

test('campaign has attributes', function () {
    $campaign = Campaign::factory()->create();
    expect($campaign->id)->toBeUuid();
    expect($campaign->name)->toBeString();
    expect($campaign->enabled_at)->toBeNull();
    expect($campaign->valid_until)->toBeNull();
    expect($campaign->url)->toBe(route('campaign-checkin', ['campaign' => $campaign->id]));
    expect($campaign->qrcode_uri)->toBeString();
});

test('campaign toggle between enabled and disabled', function () {
    $campaign = Campaign::factory()->create();
    expect($campaign->enabled)->toBeFalse();
    $campaign->enabled = true;
    $campaign->save();
    expect($campaign->enabled)->toBeTrue();
    expect($campaign->enabled_at)->toBeInstanceOf(Carbon::class);
});

test('campaign has a validity period', function () {
    $campaign = Campaign::factory()->create();
    expect($campaign->valid)->toBeTrue();
    $campaign->valid_until = Carbon::parse('yesterday');
    $campaign->save();
    expect($campaign->valid)->toBeFalse();
    expect($campaign->valid_until)->toBeInstanceOf(Carbon::class);
});

test('campaign has agent relation', function () {
    $campaign = Campaign::factory()->forAgent()->create();
    expect($campaign->agent)->toBeInstanceOf(Agent::class);
    $campaign = Campaign::factory()->create();
    expect($campaign->agent)->toBeNull();
    $agent = Agent::factory()->create();
    $campaign->agent()->associate($agent);
    $campaign->save();
    expect($campaign->agent->is($agent))->toBeTrue();
});

test('campaign has organization relation', function () {
    $campaign = Campaign::factory()->forOrganization()->create();
    expect($campaign->organization)->toBeInstanceOf(Organization::class);
    $campaign = Campaign::factory()->create();
    expect($campaign->organization)->toBeNull();
    $organization = Organization::factory()->create();
    $campaign->organization()->associate($organization);
    $campaign->save();
    expect($campaign->organization->is($organization))->toBeTrue();
});

test('campaign has many checkins', function () {
    $campaign = Campaign::factory()->create();
    expect($campaign->checkins)->toHaveCount(0);
    [$checkin1, $checkin2] = Checkin::factory(2)->make();
    $campaign->checkins()->saveMany([$checkin1, $checkin2]);
    $campaign->save();
    $campaign->refresh();
    expect($campaign->checkins)->toHaveCount(2);
    $url = $this->faker->url();
    $id = $this->faker->uuid();
    $campaign->checkins()->forceCreate(['id' => $id, 'url' => $url]);
    $campaign->save();
    $campaign->refresh();
    expect($campaign->checkins)->toHaveCount(3);
    $checkin = Checkin::find($id);
    expect($checkin->url)->toBe($url);
});
