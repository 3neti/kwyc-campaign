<?php

use App\Hyperverge\Data\{FaceMatchModuleData, HypervergeData, IdModuleData, SelfieModuleData, WorkflowData};
use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};

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
})->with('json');
