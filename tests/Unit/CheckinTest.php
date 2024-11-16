<?php

use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Data\{CampaignData, CheckinData, InputsData};
use Spatie\SchemalessAttributes\SchemalessAttributes;
use Illuminate\Support\Facades\Notification;
use App\Hyperverge\Actions\RetrieveResult;
use App\Hyperverge\Events\ResultRetrieved;
use App\Hyperverge\Data\HypervergeData;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Http;
use App\Models\{Agent, Campaign, Checkin};
use Illuminate\Support\Carbon;

uses(RefreshDatabase::class, WithFaker::class);

test('checkin has attributes', function () {
    $checkin = Checkin::factory()->forCampaign()->create([
        'idImage' => 'https://jn-img.enclaves.ph/Test/idImage.jpg',
        'selfieImage' => 'https://jn-img.enclaves.ph/Test/selfieImage.jpg',
    ]);
    expect($checkin->id)->toBeUuid();
    expect($checkin->url)->toBeString();
    expect($checkin->data)->toBeArray();
    expect($checkin->data_retrieved_at)->toBeNull();
    expect($checkin->user_cancelled_at)->toBeNull();
    expect($checkin->system_declined_at)->toBeNull();
    expect($checkin->valid_until)->toBeNull();
    expect($checkin->idImage)->toBeInstanceOf(Media::class);
    expect($checkin->selfieImage)->toBeInstanceOf(Media::class);
    expect($checkin->inputs)->toBeInstanceOf(SchemalessAttributes::class);
});

test('checkin has a boolean dates', function () {
    $checkin = Checkin::factory()->forCampaign()->create();
    expect($checkin->data_retrieved)->toBeFalse();
    expect($checkin->user_cancelled)->toBeFalse();
    expect($checkin->system_declined)->toBeFalse();
    $checkin->data_retrieved = true;
    $checkin->user_cancelled = true;
    $checkin->system_declined = true;
    $checkin->save();
    expect($checkin->data_retrieved)->toBeTrue();
    expect($checkin->user_cancelled)->toBeTrue();
    expect($checkin->system_declined)->toBeTrue();
    expect($checkin->data_retrieved_at)->toBeInstanceOf(Carbon::class);
    expect($checkin->user_cancelled_at)->toBeInstanceOf(Carbon::class);
    expect($checkin->system_declined_at)->toBeInstanceOf(Carbon::class);
});
//
test('checkin belongs to a campaign', function () {
    $checkin = Checkin::factory()->make();
    expect($checkin->campaign)->toBeNull();
    $campaign = Campaign::factory()->create();
    $checkin->campaign()->associate($campaign);
    $checkin->save();
    expect($checkin->campaign->is($campaign))->toBeTrue();
});

beforeEach(function () {
    Event::fake(ResultRetrieved::class);
    Notification::fake();
    $this->faker = $this->makeFaker('en_PH');
    $this->uuid = $this->faker->uuid();
    $this->json = mockJsonResponseRetrieveResult($this->uuid);
    $this->checkin = tap(Campaign::factory()->forOrganization()->for(Agent::factory())
        ->has(Checkin::factory()->state(['id' => $this->uuid, 'url' => null]), 'checkins')
        ->create()->checkins[0], function ($checkin) {
        tap(app(RetrieveResult::class), function ($action) use ($checkin) {
            Http::fake([
                $action->hyperverge->url() => Http::response($this->json, 200)
            ]);
            $action->run($checkin);
        });
        $checkin->inputs = ['mobile' => '09171234567', 'email' => 'john@doe.com'];
    });
});

test('checkin has inputs)', function() {
//    expect($this->checkin->getAttribute('inputs'))->toBeEmpty();
    $array = [
        'mobile' => $this->faker->phoneNumber(),
        'attrib1' => $this->faker->name(),
        'attrib2' => $this->faker->name(),
        'attrib3' => $this->faker->name(),
    ];
    tap($this->checkin)->update(['inputs' => $array])->save();
    expect($array['mobile'])->toBe($this->checkin->inputs->get('mobile'));
    expect($array['attrib1'])->toBe($this->checkin->inputs->get('attrib1'));
    expect($array['attrib2'])->toBe($this->checkin->inputs->get('attrib2'));
    expect($array['attrib3'])->toBe($this->checkin->inputs->get('attrib3'));
});

test('checkin has data', function () {
    $data = CheckinData::fromModel($this->checkin);
    expect($data->code)->toBe($this->checkin->id);
    expect($data->campaign)->toBeInstanceOf(CampaignData::class);
    expect($data->inputs)->toBeInstanceOf(InputsData::class);
    expect($data->data)->toBeInstanceOf(HypervergeData::class);
    expect($data->dataRetrievedAt)->toBeInstanceOf(Carbon::class);
});
