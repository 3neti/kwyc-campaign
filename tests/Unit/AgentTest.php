<?php

use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use App\Models\{Agent, User};

uses(RefreshDatabase::class, WithFaker::class);

test('agent is a child of user', function () {
    $agent = Agent::factory()->create();
    if ($agent instanceof Agent) {
        expect($agent)->toBeInstanceOf(User::class);
        expect($agent->id)->toBeInt();
        expect($agent->name)->toBeString();
    }
});

test('agent has user type agent', function () {
    $user = User::factory()->create();
    expect($user->type)->toBeNull();
    $agent = Agent::factory()->create();
    expect($agent->type)->toBe('agent');
});
