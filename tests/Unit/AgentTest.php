<?php

use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use App\Models\Agent;

uses(RefreshDatabase::class, WithFaker::class);

test('agent is a child of user', function () {
    $agent = Agent::factory()->create();
    if ($agent instanceof Agent) {
        expect($agent)->toBeInstanceOf(\App\Models\User::class);
        expect($agent->id)->toBeInt();
        expect($agent->name)->toBeString();
    }
});
