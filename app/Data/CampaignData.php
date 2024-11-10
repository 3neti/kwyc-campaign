<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use App\Models\Campaign;

class CampaignData extends Data
{
    public function __construct(
        public string $code,
        public string $name,
        public OrganizationData $organization,
        public AgentData $agent
    ) {}

    public static function fromModel(Campaign $campaign): self
    {
        return new self(
            code: $campaign->id,
            name: $campaign->name,
            organization: OrganizationData::fromModel($campaign->organization),
            agent: AgentData::fromModel($campaign->agent)
        );
    }
}
