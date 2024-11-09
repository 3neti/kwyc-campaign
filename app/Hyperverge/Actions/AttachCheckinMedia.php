<?php

namespace App\Hyperverge\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;
use Illuminate\Support\Arr;
use App\Models\Checkin;

class AttachCheckinMedia
{
    use AsAction;

    public function handle(Checkin $checkin, array $attribs): Checkin
    {
        $checkin->update($attribs);
        $checkin->save();

        return $checkin;
    }

    public function rules(): array
    {
        return Arr::mapWithKeys(app(Checkin::class)->getMediaFieldNames(), function (string $mediaFieldName) {
            return [
                $mediaFieldName => ['nullable', 'url'],
            ];
        });
    }

    public function asController(Checkin $checkin, ActionRequest $request): \Illuminate\Http\JsonResponse
    {
        $checkin = $this->handle($checkin, $request->validated());

        return response()->json([
            'checkin' => $checkin->toArray(),
        ]);
    }
}
