<?php

namespace App\Hyperverge\Data;
;
use App\Hyperverge\Data\DetailData;
use Spatie\LaravelData\Attributes\MapInputName;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Illuminate\Support\Arr;

/**
 * @deprecated
 */
class ResultData extends Data
{
    public function __construct(
        public DetailData $details,
        #[MapInputName('summary')]
        public string $action
    ) {}

    public static function from(...$payloads): static
    {
        if (!Arr::isAssoc($payloads[0]['details'])) {
            $payloads[0]['details'] = $payloads[0]['details'][0];
        }

        return parent::from(...$payloads);
    }

    public static function prepareForPipeline(array $properties) : array
    {
        foreach ($properties as $property => $value) {
            if ($property == 'summary') {
                $val = empty($value['action']) ? null : $value['action'];
                $properties[$property] = $val;
            };
        }

        return $properties;
    }
}
