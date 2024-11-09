<?php

use App\Hyperverge\{Actions\ProcessResult, Actions\RetrieveResult, Events\ResultProcessed, Events\ResultRetrieved};
use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use Illuminate\Support\Facades\{Event, Http, Notification};
use App\Hyperverge\Events\ExtractedFieldsPersisted;
use App\Models\{Campaign, Checkin};

uses(RefreshDatabase::class, WithFaker::class);

beforeEach(function () {
    Event::fake(ResultRetrieved::class);
    Notification::fake();
    $this->faker = $this->makeFaker('en_PH');
    $this->uuid = $this->faker->uuid();
    $this->json = mockJsonResponseRetrieveResult($this->uuid);
//    $this->data = KYCData::from($this->json);
    $this->checkin = tap(Campaign::factory()
        ->has(Checkin::factory()->state(['id' => $this->uuid, 'url' => null]), 'checkins')
        ->create()->checkins[0], function ($checkin) {
        tap(app(RetrieveResult::class), function ($action) use ( $checkin) {
            Http::fake([
                $action->hyperverge->url() => Http::response($this->json, 200)
            ]);
            $action->run($checkin);
        });
    });
});

dataset('inputs', [
    fn() => ['mobile' => $this->faker->mobileNumber()]
]);

it('can process pipelines', function () {
    /*** arrange ***/
    Event::fake(ExtractedFieldsPersisted::class);

    /*** act ***/
    app(ProcessResult::class)->run($this->checkin);

    /*** assert ***/
    Event::assertDispatched(ExtractedFieldsPersisted::class, function ($event) {
        return $event->checkin->is($this->checkin);
    });
    Event::dispatched(ResultProcessed::class, function ($event) {
        return $event->checkin->is($this->checkin);
    });
});

//it('can process result with inputs', function () {
//    /*** arrange ***/
//    $inputs = [
//        'field1' => 'value1',
//        'field2' => 'value3',
//    ];
//
//    /*** act ***/
//    app(ProcessResult::class)->run($this->checkin, $inputs);
//
//    /*** assert ***/
//    expect(array_diff_assoc($inputs, $this->checkin->inputs->all()))->toBe([]);
//});
//
//it('can process result and update contact handle', function () {
//    /*** act ***/
//    app(ProcessResult::class)->run($this->checkin);
//
//    /*** assert ***/
//    expect($this->checkin->contact->handle)->toBe($this->checkin->data->getName());
//});
//
//it('can process result and update checkin and contact mobile', function (array $inputs) {
//    /*** act ***/
//    app(ProcessResult::class)->run($this->checkin, $inputs);
//
//    /*** arrange ***/
//    $mobile = $inputs['mobile'];
//
//    /*** assert ***/
//    expect($this->checkin->inputs->mobile)->toBe($mobile);
//    expect($this->checkin->mobile)->toBe($mobile);
//    expect(phone($this->checkin->contact->mobile, $country = $this->checkin->contact->mobile_country)->equals($mobile, $country))
//        ->toBeTrue();
//    expect($this->checkin->contact->handle)->toBe($this->checkin->data->getName());
//})->with('inputs');
