<?php

use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use App\Hyperverge\Events\CallbackAutoApproved;
use Illuminate\Support\Facades\{Event, Queue};
use App\Hyperverge\Enums\HypervergeResponse;
use App\Hyperverge\Actions\ReceiveCallback;
use App\Hyperverge\Actions\RetrieveResult;
use Illuminate\Events\CallQueuedListener;
use App\Models\{Campaign, Checkin};

uses(RefreshDatabase::class, WithFaker::class);

dataset('checkin', [
    fn() => Campaign::factory()
        ->has(Checkin::factory()->state(['data' => null]), 'checkins')
        ->create()->checkins[0]
]);

it('callback auto approved', function (Checkin $checkin) {
    Event::fake(CallbackAutoApproved::class);
    $callback_url = route('hyperverge-callback', ['transactionId' => $checkin->id, 'status' => HypervergeResponse::AUTO_APPROVED]);
    $response = $this->get($callback_url);
    expect($response->status())->toBe(302);
    expect($response->getTargetUrl())->toBe(route('checkin-contact.show', $checkin));
    Event::assertDispatched(CallbackAutoApproved::class, function ($event) use ($checkin) {
        return $event->checkin->is($checkin);
    });
})->with('checkin');

it('callback handled by callback auto approved', function (Checkin $checkin) {
    ReceiveCallback::mock()->shouldReceive('handle')->once();
    $callback_url = route('hyperverge-callback', ['transactionId' => $checkin, 'status' => HypervergeResponse::AUTO_APPROVED]);
    $this->get($callback_url);
})->with('checkin');

it('callback user cancelled', function (Checkin $checkin) {
    Event::fake(CallbackAutoApproved::class);
    $callback_url = route('hyperverge-callback', ['transactionId' => $checkin, 'status' => HypervergeResponse::USER_CANCELLED]);
    $response = $this->get($callback_url);
    expect($response->status())->toBe(302);
    expect($response->getTargetUrl())->toBe(route('checkin-user_cancelled'));
    Event::assertNotDispatched(CallbackAutoApproved::class);
})->with('checkin');

it('fires retrieve result action', function (Checkin $checkin) {
    Queue::fake();
    app(ReceiveCallback::class)->run($checkin->id, HypervergeResponse::AUTO_APPROVED->value);
    Queue::assertPushed(
        CallQueuedListener::class,
        function ($listener) {
            return $listener->class === RetrieveResult::class;
        }
    );
})->with('checkin');
