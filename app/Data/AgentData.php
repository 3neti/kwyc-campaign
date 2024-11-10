<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use App\Models\Agent;

class AgentData extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
        public ?string $mobile
    ) {}

    public static function fromModel(Agent $agent): self
    {
        return new self(
            id: $agent->id,
            name: $agent->name,
            email: $agent->email,
            mobile: $agent->mobile,
        );
    }
}
