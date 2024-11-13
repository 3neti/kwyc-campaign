<?php

use App\Hyperverge\Enums\IdType;
use App\Hyperverge\Data\{FaceMatchModuleData, HypervergeData, IdModuleData, SelfieModuleData, WorkflowData};
use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use Illuminate\Support\Arr;

uses(RefreshDatabase::class, WithFaker::class);

dataset('json', [
    [fn() => mockJsonResponseRetrieveResult($this->faker->uuid())]
]);

it('hyperverge data works', function (string $json) {
    $data = HypervergeData::from($json);
    expect($data->status)->toBeString();
    expect($data->statusCode)->toBeInt();
    expect($data->applicationStatus)->toBeString();
    expect($data->workflowData)->toBeInstanceOf(WorkflowData::class);
    expect($data->idModuleData)->toBeInstanceOf(IdModuleData::class);
    expect($data->selfieModuleData)->toBeInstanceOf(SelfieModuleData::class);
    expect($data->faceMatchData)->toBeInstanceOf(FaceMatchModuleData::class);
    $array = $data->toArray();
    expect(Arr::get($array, 'idType'))->toBe(IdType::tryFrom($data->idModuleData->idCardData->idType)?->name());
    expect(Arr::get($array, 'fieldsExtracted'))->toBe(array_filter($data->idModuleData->fieldsExtractedData->toArray()));
    expect(Arr::get($array, 'idImageUrl'))->toBe($data->idModuleData->imageUrl);
    expect(Arr::get($array, 'idChecks'))->toBe($data->idModuleData->qualityChecksData->toArray());
    expect(Arr::get($array, 'selfieChecks'))->toBe($data->selfieModuleData->qualityChecksData->toArray());
    expect(Arr::get($array, 'selfieImageUrl'))->toBe($data->selfieModuleData->imageUrl);
    expect(Arr::get($array, 'by'))->toBe('lester@hurtado.ph');
})->with('json');
