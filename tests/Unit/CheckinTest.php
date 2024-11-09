<?php

use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use App\Models\{Agent, Campaign, Checkin, Organization};
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Carbon;

uses(RefreshDatabase::class, WithFaker::class);

test('checkin has attributes', function () {
    $checkin = Checkin::factory()->forCampaign()->create([
        'idImage' => 'https://jn-img.enclaves.ph/Test/idImage.jpg',
        'selfieImage' => 'https://jn-img.enclaves.ph/Test/selfieImage.jpg',
    ]);
    expect($checkin->id)->toBeUuid();
    expect($checkin->url)->toBeString();
    expect($checkin->data)->toBeArray();
    expect($checkin->data_retrieved_at)->toBeNull();
    expect($checkin->user_cancelled_at)->toBeNull();
    expect($checkin->system_declined_at)->toBeNull();
    expect($checkin->valid_until)->toBeNull();
    expect($checkin->idImage)->toBeInstanceOf(Media::class);
    expect($checkin->selfieImage)->toBeInstanceOf(Media::class);
});

test('checkin has a boolean dates', function () {
    $checkin = Checkin::factory()->forCampaign()->create();
    expect($checkin->data_retrieved)->toBeFalse();
    expect($checkin->user_cancelled)->toBeFalse();
    expect($checkin->system_declined)->toBeFalse();
    $checkin->data_retrieved = true;
    $checkin->user_cancelled = true;
    $checkin->system_declined = true;
    $checkin->save();
    expect($checkin->data_retrieved)->toBeTrue();
    expect($checkin->user_cancelled)->toBeTrue();
    expect($checkin->system_declined)->toBeTrue();
    expect($checkin->data_retrieved_at)->toBeInstanceOf(Carbon::class);
    expect($checkin->user_cancelled_at)->toBeInstanceOf(Carbon::class);
    expect($checkin->system_declined_at)->toBeInstanceOf(Carbon::class);
});

test('checkin belongs to a campaign', function () {
    $checkin = Checkin::factory()->make();
    expect($checkin->campaign)->toBeNull();
    $campaign = Campaign::factory()->create();
    $checkin->campaign()->associate($campaign);
    $checkin->save();
    expect($checkin->campaign->is($campaign))->toBeTrue();
});
