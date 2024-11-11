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
        $details = Arr::get($checkin->data, Checkin::FIELDS_EXTRACTED_INDEX);

        foreach (Extracted::cases() as $extracted) {
            $field = $extracted->value;
            $value = Arr::get($details, $extracted->index());
            if (!$value) continue;
            $checkin->extracted_fields()->create(compact('field', 'value'));
        }
        ExtractedFieldsPersisted::dispatchIf($checkin->load('extracted_fields')->extracted_fields->count() > 0, $checkin);

        return $next($checkin);
    }
}
