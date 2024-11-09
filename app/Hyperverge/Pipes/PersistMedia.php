<?php

namespace App\Hyperverge\Pipes;

use App\Hyperverge\Events\ImagesPersisted;
use App\Hyperverge\Enums\Images;
use Illuminate\Support\Arr;
use App\Models\Checkin;
use Closure;

class PersistMedia
{
    public function handle(Checkin $checkin, Closure $next)
    {
        $details = Arr::get($checkin->data,  Checkin::FACE_MATCH_INDEX);
        foreach (Images::cases() as $image) {
            $field = $image->value;
            $value = Arr::get($details, $image->index());
            if (!$value) continue;
            $checkin->setAttribute($field, $value);
        }
        $checkin->save();
        ImagesPersisted::dispatchIf(count($checkin->uploads) > 0, $checkin);

        return $next($checkin);
    }
}
