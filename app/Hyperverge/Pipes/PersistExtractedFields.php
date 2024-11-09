<?php

namespace App\Hyperverge\Pipes;

use App\Hyperverge\Events\ExtractedFieldsPersisted;
use App\Hyperverge\Enums\Extracted;
use Illuminate\Support\Arr;
use App\Models\Checkin;
use Closure;

class PersistExtractedFields
{
    public function handle(Checkin $checkin, Closure $next)
    {
//        dd(Arr::get($checkin->data, 'result.results.0.apiResponse.result.details.0'));
//        dd(Arr::get($checkin->data, 'result.results.2.moduleId'));
        $details = Arr::get($checkin->data, Checkin::DATA_INDEX);
        foreach (Extracted::cases() as $extracted) {
            $field = $extracted->value;
            $value = Arr::get($details, $extracted->index());
            if (!$value) continue;
            $checkin->extracted_fields()->create(compact('field', 'value'));
        }
        ExtractedFieldsPersisted::dispatchIf($checkin->fresh()->extracted_fields->count() > 0, $checkin);

        return $next($checkin);
    }
}
