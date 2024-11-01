<?php

use App\Hyperverge\{Action, Hyperverge, ProcessResult, ResultRetrieved, RetrieveResult};
use Illuminate\Support\Facades\{Event, Http, Notification, Queue};
use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use Illuminate\Events\CallQueuedListener;
use Illuminate\Http\Client\Request;
use App\Models\{Campaign, Checkin};

uses(RefreshDatabase::class, WithFaker::class);

beforeEach(function () {
    Notification::fake();
});

dataset('checkin', [
    fn() => Campaign::factory()
        ->has(Checkin::factory()->state(['data' => null]), 'checkins')
        ->create()
]);

it('can inject hyperverge headers result_endpoint', function () {
    tap(app(RetrieveResult::class)->hyperverge->headers(), function (array $headers) {
        expect($headers['appId'])->toBe(config('hyperverge.api.id'));
        expect($headers['appKey'])->toBe(config('hyperverge.api.key'));
    });
    expect(app(RetrieveResult::class)->hyperverge->url())->toBe(config('hyperverge.api.url.result'));
});

it('can retrieve the result', function (Campaign $campaign) {
    Event::fake();

    /*** arrange ***/
    $checkin = $campaign->checkins[0];
    $transactionId = $checkin->id;
    $json = mockJsonResponseRetrieveResult($transactionId);

    $action = app(RetrieveResult::class);
    Http::fake([
        $action->hyperverge->url() => Http::response($json, 200)
    ]);

    /*** assert ***/
    $this->assertNull($checkin->data);

    /*** act ***/
    $result = $action->run($checkin);

    /*** assert ***/
    Http::assertSent(function (Request $request) use ($checkin) {
        return
            $request->hasHeader('appId', app(Hyperverge::class)->headers()['appId'])
            && $request->hasHeader('appKey', app(Hyperverge::class)->headers()['appKey'])
            && $request->url() == app(Hyperverge::class)->setAction(Action::Result)->url()
            && $request['transactionId'] ==  $checkin->id
            ;
    });
    $this->assertTrue($result);
    $this->assertNotNull($checkin->data);

    Event::assertDispatched(ResultRetrieved::class, function ($event) use ($checkin) {
        return $event->checkin->is($checkin);
    });
})->with('checkin');

it('fires process result action', function (Campaign $campaign) {
    Queue::fake();

    /*** arrange ***/
    $checkin = $campaign->checkins[0];
    $transactionId = $checkin->id;
    $json = mockJsonResponseRetrieveResult($transactionId);

    $action = app(RetrieveResult::class);
    Http::fake([
        $action->hyperverge->url() => Http::response($json, 200)
    ]);

    /*** act ***/
    $action->run($checkin);
    Queue::assertPushed(
        CallQueuedListener::class,
        function ($listener) {
            return $listener->class === ProcessResult::class;
        }
    );
})->with('checkin');