<?php

namespace App\Data;

use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use App\Hyperverge\Data\HypervergeData;
use Illuminate\Support\Carbon;
use Spatie\LaravelData\Data;
use App\Models\Checkin;

class CheckinData extends Data
{
    public function __construct(
        public string $code,
        public CampaignData $campaign,
        public InputsData $inputs,
        public HypervergeData $data,
        #[WithCast(DateTimeInterfaceCast::class, timeZone: 'Asia/Manila')]
        public Carbon $dataRetrievedAt
    ) {}

    public static function fromModel(Checkin $checkin): self
    {
        return new self(
            code: $checkin->id,
            campaign: CampaignData::fromModel($checkin->campaign),
            inputs: InputsData::from($checkin->inputs),
            data: HypervergeData::fromArray($checkin->data),
            dataRetrievedAt: $checkin->data_retrieved_at
        );
    }
}
