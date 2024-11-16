<?php

use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use App\Data\{AgentData, CampaignData, OrganizationData};
use App\Models\{Agent, Campaign, Checkin, Organization};
use Illuminate\Support\Facades\Notification;
use App\Notifications\CheckinFeedback;
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
    expect($campaign->splash)->toBeString();
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
    $campaign = Campaign::factory()->for(Agent::factory()->state(['name' => 'Mary Cruz']))->create();
    expect($campaign->agent)->toBeInstanceOf(Agent::class);
    expect($campaign->agent->name)->toBe('Mary Cruz');
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

test('campaign can create a checkin without params', function () {
    $campaign = Campaign::factory()->create();
    $checkin = $campaign->checkins()->create();
    expect($checkin)->toBeInstanceOf(Checkin::class);
});

test('campaign has seeder', function () {
    expect(Campaign::all())->toHaveCount(0);
    $this->seed(\Database\Seeders\CampaignSeeder::class);
    expect(Campaign::all())->toHaveCount(1);
    $campaign = Campaign::where('email', 'devops@joy-nostalg.com')->first();
    expect($campaign)->toBeInstanceOf(Campaign::class);
});

test('campaign is notifiable', function () {
    Notification::fake();
    $email = 'devops@joy-nostalg.com';
    $mobile = '09173011987';
    $checkin = Checkin::factory()->forCampaign(compact('email', 'mobile'))->create();
    $checkin->campaign->notify(new CheckinFeedback($checkin));
    Notification::assertSentTo($checkin->campaign, function (CheckinFeedback $checkinFeedback) use ($checkin) {
        return $checkinFeedback->checkin->is($checkin);
    });
});

test('campaign has data', function () {
//    $campaign = Campaign::factory()->forOrganization()->forAgent()->create();
    $campaign = Campaign::factory()->forOrganization()->for(Agent::factory())->create();
    $data = CampaignData::fromModel($campaign);
    expect($data->code)->toBe($campaign->id);
    expect($data->name)->toBe($campaign->name);
    expect($data->organization->toArray())->toBe(OrganizationData::fromModel($campaign->organization)->toArray());
    expect($data->agent->toArray())->toBe(AgentData::fromModel($campaign->agent)->toArray());
});

test('campaign has input attributes', function () {
    $campaign = Campaign::factory()->forOrganization()->for(Agent::factory())->create();
    $campaign->inputAttributes = ['email', 'mobile'];
    $campaign = Campaign::find($campaign->id);
    expect($campaign->inputAttributes)->toBe(['email', 'mobile']);
});

