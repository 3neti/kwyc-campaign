<?php

use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use App\Models\{Checkin, ExtractedField};


uses(RefreshDatabase::class, WithFaker::class);

test('extracted field has attributes', function () {
    $extracted_field = ExtractedField::factory()->for(Checkin::factory()->forCampaign())->create();
    expect($extracted_field->field)->toBeString();
    expect($extracted_field->value)->toBeString();
});

test('extracted fields belongs to checkin', function () {
    $checkin = Checkin::factory()->forCampaign()->create();
    expect($checkin->extracted_fields)->toHaveCount(0);
    [$extracted_field1, $extracted_field2]  = ExtractedField::factory(2)->make();
    $checkin->extracted_fields()->saveMany([$extracted_field1, $extracted_field2]);
    $checkin->save();
    $checkin->refresh();
    expect($checkin->extracted_fields)->toHaveCount(2);
    $checkin->extracted_fields()->create(['field' => $this->faker->word(), 'value' => $this->faker->name()]);
    $checkin->save();
    $checkin->refresh();
    expect($checkin->extracted_fields)->toHaveCount(3);
    $checkin = Checkin::factory()->forCampaign()->create();
    $checkin->extracted_fields()->createMany([
        ['field' => $this->faker->word(), 'value' => $this->faker->name()],
        ['field' => $this->faker->word(), 'value' => $this->faker->name()]
    ]);
    $checkin->save();
    $checkin->refresh();
    expect($checkin->extracted_fields)->toHaveCount(2);
});
