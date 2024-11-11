<?php

namespace App\Hyperverge\Data;

use Spatie\LaravelData\Data;

/**
 * @deprecated
 */
class APIResponseData extends Data
{
    public function __construct(
        public string $status,
        public int $statusCode,
        public array $metadata,
        public ResultData $result,
    ) {}
}
