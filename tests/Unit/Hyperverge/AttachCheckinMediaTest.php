<?php


use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Hyperverge\Actions\AttachCheckinMedia;
use App\Models\Checkin;

uses(RefreshDatabase::class, WithFaker::class);

dataset('checkin', function () {
    return [
        [fn () => Checkin::factory()->forCampaign()->create(['idImage' => null, 'selfieImage' => null])],
    ];
});

test('attach contact media action works', function (Checkin $checkin) {
    $attribs = [
        'idImage' => 'https://jn-img.enclaves.ph/Test/idImage.jpg',
        'selfieImage' => 'https://jn-img.enclaves.ph/Test/selfieImage.jpg',
    ];
    $checkin = app(AttachCheckinMedia::class)->run($checkin, $attribs);
    expect($checkin->idImage)->toBeInstanceOf(Media::class);
    expect($checkin->selfieImage)->toBeInstanceOf(Media::class);
    expect($checkin->uploads)->toBe([
        [
            'name' => $checkin->idImage->name,
            'url' => $checkin->idImage->getUrl(),
        ],
        [
            'name' => $checkin->selfieImage->name,
            'url' => $checkin->selfieImage->getUrl(),
        ],
    ]);
    $checkin->idImage->delete();
    $checkin->selfieImage->delete();
    $checkin->clearMediaCollection('id-images');
    $checkin->clearMediaCollection('selfie-images');
})->with('checkin');
