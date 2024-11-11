<?php

namespace App\Hyperverge\Data;

use App\Hyperverge\Enums\HypervergeModule;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Data;

/**
 * @deprecated
 */
class ModuleData extends Data
{
    public function __construct(
        public HypervergeModule $moduleId,
        public int $attempts,
        public string|Optional $imageUrl,
        public string|Optional $croppedImageUrl,
        public string|Optional $documentSelected,
        public string|Optional $expectedDocumentSide,
        public APIResponseData $apiResponse
    ) {}
}
