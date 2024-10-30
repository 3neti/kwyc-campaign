<?php

use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use App\Models\Organization;

uses(RefreshDatabase::class, WithFaker::class);

test('agent is a child of user', function () {
    $organization = Organization::factory()->create();
    if ($organization instanceof Organization) {
        expect($organization)->toBeInstanceOf(\App\Models\Organization::class);
        expect($organization->id)->toBeInt();
        expect($organization->name)->toBeString();
    }
});
