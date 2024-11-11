<?php

namespace App\Hyperverge\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Data;

/**
 * @deprecated
 */
class QualityCheckData extends Data
{
    public function __construct(
        public string|Optional $blur,
        public string|Optional $glare,
        public string|Optional $blackAndWhite,
        public string|Optional $capturedFromScreen,
        public string|Optional $partialId,
        public string|Optional $eyesClosed,
        public string|Optional $maskPresent,
        public string|Optional $multipleFaces
    ) {}

    public static function prepareForPipeline(array $properties) : array
    {
        foreach ($properties as $property => $value) {
            $val = empty($value['value']) ? null : $value['value'];
            $properties[$property] = $val;
        }

        return $properties;
    }
}
