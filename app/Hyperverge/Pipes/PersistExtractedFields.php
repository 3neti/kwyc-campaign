<?php

namespace App\Hyperverge\Pipes;

use App\Hyperverge\Enums\Extracted;
use App\Models\Checkin;
use Closure;
use Illuminate\Support\Arr;

class PersistExtractedFields
{
    public function handle(Checkin $checkin, Closure $next)
    {
//        dd(Arr::get($checkin->data, 'result.results.0.apiResponse.result.details.0'));
//        dd(Arr::get($checkin->data, 'result.results.2.moduleId'));
        $details = Arr::get($checkin->data, 'result.results.0.apiResponse.result.details.0');
        foreach (Extracted::cases() as $extracted) {
            $field = $extracted->value;
            $value = Arr::get($details, $extracted->index());
            if (!$value) continue;
            $checkin->extracted_fields()->create(compact('field', 'value'));
        }

        return $next($checkin);
    }
}
