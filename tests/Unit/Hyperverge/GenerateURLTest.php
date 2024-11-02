<?php

use App\Hyperverge\{Actions\GenerateURL, Actions\UpdateCheckinUrl, Events\URLGenerated, Hyperverge};
use Illuminate\Events\CallQueuedListener;
use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\{Event, Http, Queue};

uses(RefreshDatabase::class, WithFaker::class);

beforeEach(function () {
    $this->url = $this->faker->url();
    $this->action = app(GenerateURL::class);
    Http::fake([
        $this->action->hyperverge->url() => Http::response(mockResponseJsonGenerateUrl($this->url), 200)
    ]);
});

it('can inject hyperverge headers endpoint body', function () {
    tap(app(GenerateURL::class)->hyperverge->headers(), function (array $headers) {
        expect($headers['appId'])->toBe(config('hyperverge.api.id'));
        expect($headers['appKey'])->toBe(config('hyperverge.api.key'));
    });
    expect(app(GenerateURL::class)->hyperverge->url())->toBe(config('hyperverge.api.url.kyc'));
    $transactionId = $this->faker->uuid();
    tap(app(GenerateURL::class)->hyperverge->body($transactionId), function (array $body) {
        expect($body['workflowId'])->toBe(config('hyperverge.url.workflow'));
        expect($body['redirectUrl'])->toBe(route('hyperverge-result'));
        expect($body['inputs'])->toBe(['app' => config('app.name')]);
        expect($body['languages'])->toBe(['en' => 'English']);
        expect($body['defaultLanguage'])->toBe('en');
    });
});

it('can generate the url with default workflow', function () {
    Event::fake(URLGenerated::class);

    /*** arrange ***/
    $transactionId = $this->faker->uuid();

    /*** act ***/
    $result = $this->action->run($transactionId);

    /*** assert ***/
    Http::assertSent(function (Request $request) use($transactionId) {
        return
            $request->hasHeader('appId', app(Hyperverge::class)->headers()['appId'])
            && $request->hasHeader('appKey', app(Hyperverge::class)->headers()['appKey'])
            && $request->url() == app(Hyperverge::class)->url()
            && $request['workflowId'] == app(Hyperverge::class)->body($transactionId)['workflowId']
            && $request['redirectUrl'] == app(Hyperverge::class)->body($transactionId)['redirectUrl']
            && $request['inputs'] == app(Hyperverge::class)->body($transactionId)['inputs']
            && $request['languages'] ==  app(Hyperverge::class)->body($transactionId)['languages']
            && $request['defaultLanguage'] ==  app(Hyperverge::class)->body($transactionId)['defaultLanguage']
            && $request['expiry'] == app(Hyperverge::class)->body($transactionId)['expiry']
            ;
    });
    $this->assertEquals($this->url, $result);
    Event::assertDispatched(URLGenerated::class, function ($event) use ($transactionId) {
        return $event->transactionId == $transactionId
            && $event->url == $this->url
            ;
    });
});

it('can generate the url with injected workflow', function (string $workflowId) {
    Event::fake(URLGenerated::class);

    /*** arrange ***/
    $transactionId = $this->faker->uuid();

    /*** act ***/
    $result = $this->action->run($transactionId, $workflowId);

    /*** assert ***/
    Http::assertSent(function (Request $request) use ($transactionId, $workflowId) {
        return
            $request->hasHeader('appId', app(Hyperverge::class)->headers()['appId'])
            && $request->hasHeader('appKey', app(Hyperverge::class)->headers()['appKey'])
            && $request->url() == app(Hyperverge::class)->url()
            && $request['workflowId'] == $workflowId
            && $request['redirectUrl'] == app(Hyperverge::class)->body($transactionId)['redirectUrl']
            && $request['inputs'] == app(Hyperverge::class)->body($transactionId)['inputs']
            && $request['languages'] ==  app(Hyperverge::class)->body($transactionId)['languages']
            && $request['defaultLanguage'] ==  app(Hyperverge::class)->body($transactionId)['defaultLanguage']
            && $request['expiry'] == app(Hyperverge::class)->body($transactionId)['expiry']
            ;
    });
    $this->assertEquals($this->url, $result);
    Event::assertDispatched(URLGenerated::class, function ($event) use ($transactionId, $workflowId) {
        return $event->transactionId == $transactionId
            && $event->url == $this->url
            && Hyperverge::$workflowId == $workflowId
            ;
    });
})->with([
    fn () => $this->faker->word()
]);

it('fires update checkin url action', function () {
    Queue::fake();

    /*** arrange ***/
    $transactionId = $this->faker->uuid();

    /*** act ***/
    $url = $this->action->run($transactionId);
    Queue::assertPushed(
        CallQueuedListener::class,
        function ($listener) {
            return $listener->class === UpdateCheckinUrl::class;
        }
    );
});
