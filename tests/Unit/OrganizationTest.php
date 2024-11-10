<?php

use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use App\Models\{Agent, Campaign, Organization, Team};
use App\Data\OrganizationData;

uses(RefreshDatabase::class, WithFaker::class);

test('organization is a child of team', function () {
    $organization = Organization::factory()->create();
    if ($organization instanceof Organization) {
        expect($organization)->toBeInstanceOf(Team::class);
        expect($organization->id)->toBeInt();
        expect($organization->name)->toBeString();
    }
});

test('organization belongs to an agent', function () {
    $organization = Organization::factory()->forAgent()->create();
    expect($organization->agent)->toBeInstanceOf(Agent::class);
});

test('organization has many campaigns', function () {
    $organization = Organization::factory()->has(Campaign::factory(2), 'campaigns')->create();
    expect($organization->campaigns()->first())->toBeInstanceOf(Campaign::class);
    expect($organization->campaigns)->toHaveCount(2);
});

test('organization has data', function () {
    $organization = Organization::factory()->create();
    $data = OrganizationData::fromModel($organization);
    expect($data->id)->toBe($organization->id);
    expect($data->name)->toBe($organization->name);
});

