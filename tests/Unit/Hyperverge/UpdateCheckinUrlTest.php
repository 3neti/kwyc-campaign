<?php

use App\Hyperverge\{Actions\UpdateCheckinUrl, Events\CheckinUrlUpdated};
use App\Models\{Campaign, Checkin};
use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;


uses(RefreshDatabase::class, WithFaker::class);

beforeEach(function () {
    Notification::fake();
});

dataset('checkin', [
    fn() => Campaign::factory()
        ->has(Checkin::factory()->state(['url' => null]), 'checkins')
        ->create()->checkins[0]
]);

it('can update checkin url', function (Checkin $checkin) {
    Event::fake(CheckinUrlUpdated::class);

    /*** assert ***/
    $this->assertNull($checkin->url);

    /*** arrange ***/
    $transactionId = $checkin->id;
    $url = $this->faker->url();

    /*** act ***/
    $result = app(UpdateCheckinUrl::class)->run($transactionId, $url);
    $checkin = $checkin->fresh();

    /*** assert ***/
    $this->assertTrue($result);
    $this->assertEquals($checkin->url, $url);
    Event::assertDispatched(CheckinUrlUpdated::class, function ($event) use ($checkin) {
        return $event->checkin->is($checkin);
    });
})->with('checkin');
