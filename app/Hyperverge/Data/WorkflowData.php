<?php

namespace App\Hyperverge\Data;

use Spatie\LaravelData\Data;

/**
 * @deprecated
 */
class WorkflowData extends Data
{
    public function __construct(
        public string $workflowId,
        public int $version,
    ) {}
}
