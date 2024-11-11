<?php

namespace App\Hyperverge\Data;

use Spatie\LaravelData\{Data, Optional};
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @deprecated
 */
class DetailData extends Data
{
    public function __construct(
        public ?string                   $idType,
        public IDData           $fieldsExtracted,
        public string|Optional           $croppedImageUrl,
        public bool|Optional             $liveFace,
        public QualityCheckData|Optional $qualityChecks,
        public bool|Optional             $match,
    ) {}

//    public static function prepareForPipeline(array $properties) : array
//    {
//        foreach ($properties as $property => $value) {
//            $val = empty($value['value']) ? null : $value['value'];
//            if (in_array($property, ['liveFace', 'match'])) {
//                $properties[$property] = $val;
//            };
//        }
//
//        return $properties;
//    }

    #[ArrayShape(['by' => "string"])]
    public function with(): array
    {
        return [
            'by' => config('app.name')
        ];
    }
}
