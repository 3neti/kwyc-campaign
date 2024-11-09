<?php

use App\Hyperverge\{Actions\RetrieveResult,Events\ResultRetrieved};
use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use Illuminate\Support\Facades\{Event, Http, Notification};
use App\Models\{Campaign, Checkin, ExtractedField};
use App\Hyperverge\Pipes\PersistExtractedFields;
use App\Hyperverge\Enums\Extracted;
use Illuminate\Support\Arr;

uses(RefreshDatabase::class, WithFaker::class);

beforeEach(function () {
    Event::fake(ResultRetrieved::class);
    Notification::fake();
    $this->faker = $this->makeFaker('en_PH');
    $this->uuid = $this->faker->uuid();
    $this->json = mockJsonResponseRetrieveResult($this->uuid);
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

test('persist extracted fields works', function () {
    /*** arrange ***/
    $details = Arr::get($this->checkin->data, Checkin::FIELDS_EXTRACTED_INDEX);

    /*** assert ***/
    expect($this->checkin->extracted_fields->count())->toBe(0);

    /*** act ***/
    $next = function ($checkin) use ($details) {
        $checkin->extracted_fields->each(function (ExtractedField $extractedField) use ($details) {
            $code = $extractedField->field;
            $enum = Extracted::from($code);
            $value = Arr::get($details, $enum->index());
            expect($extractedField->value)->toBe($value);
        });
    };
    app()->make(PersistExtractedFields::class)->handle($this->checkin, $next);
});


