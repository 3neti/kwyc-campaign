<?php

namespace App\Traits;

use Spatie\MediaLibrary\MediaCollections\Exceptions\FileCannotBeAdded;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\MediaCollections\File;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;

trait HasCheckinMedia
{
    use InteractsWithMedia;

    public function initializeHasCheckinMedia(): void
    {
        $this->mergeFillable([
            'idImage',
            'selfieImage',
        ]);
    }

    /**
     * @throws FileCannotBeAdded
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    public function setIdImageAttribute(?string $url): static
    {
        if ($url) {
            $this->addMediaFromUrl($url)
                ->usingName('idImage')
                ->toMediaCollection('id-images');
        }

        return $this;
    }

    public function getMediaFieldNames(): array
    {
        return $this->getRegisteredMediaCollections()
            ->pluck('name')
            ->map(function ($key) {
                return Str::singular(Str::camel($key));
            })
            ->toArray();
    }

    public function getIdImageAttribute(): ?Media
    {
        return $this->getFirstMedia('id-images');
    }

    /**
     * @throws FileCannotBeAdded
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function setSelfieImageAttribute(?string $url): static
    {
        if ($url) {
            $this->addMediaFromUrl($url)
                ->usingName('selfieImage')
                ->toMediaCollection('selfie-images');
        }

        return $this;
    }

    public function getSelfieImageAttribute(): ?Media
    {
        return $this->getFirstMedia('selfie-images');
    }

    public function getUploadsAttribute(): array
    {
        return collect($this->media)
            ->mapWithKeys(function ($item, $key) {
                $collection_name = $item['collection_name'];
                $name = Str::camel(Str::singular($collection_name));
                $url = $item['original_url'];

                return [
                    $key => [
                        'name' => $name,
                        'url' => $url,
                    ],
                ];
            })
            ->toArray();
    }

    public function registerMediaCollections(): void
    {
        $collections = [
            'id-images' => ['image/jpeg', 'image/png', 'image/webp'],
            'selfie-images' => ['image/jpeg', 'image/png', 'image/webp'],
        ];

        foreach ($collections as $collection => $mimeTypes) {
            $this->addMediaCollection($collection)
                ->singleFile()
                ->acceptsFile(function (File $file) use ($mimeTypes) {
                    return in_array(
                        needle: $file->mimeType,
                        haystack: (array) $mimeTypes
                    );
                });
        }
    }
}
