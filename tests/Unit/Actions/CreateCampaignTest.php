<?php

use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use App\Models\{Agent, Campaign, Organization};
use App\Actions\CreateCampaign;

uses(RefreshDatabase::class, WithFaker::class);

test('create campaign works', function () {
   $agent = Agent::factory()->forCurrentOrganization()->create();
   $inputs1 = [
       'name' => $name = $this->faker->word(),
       'mobile' => $mobile = '09171234567',
       'email' => $email = $this->faker->email()
   ];
    expect($agent->currentCampaign)->toBeNull();
    $campaign1 = app(CreateCampaign::class)->run($agent, $inputs1);
    expect($campaign1)->toBeInstanceOf(Campaign::class);
    expect($campaign1->name)->toBe($name);
    expect($campaign1->mobile)->toBe($mobile);
    expect($campaign1->email)->toBe($email);
    expect($campaign1->organization->is($agent->currentOrganization))->toBeTrue();
    expect($agent->currentCampaign->is($campaign1))->toBeTrue();
    $inputs2 = [
        'name' => $name = $this->faker->word(),
        'mobile' => $mobile = '09181234567',
        'email' => $email = $this->faker->email()
    ];
    $campaign2 = app(CreateCampaign::class)->run($agent, $inputs2);
    expect($campaign2->organization->is($agent->currentOrganization))->toBeTrue();
    expect($agent->currentCampaign->is($campaign2))->toBeTrue();
});
