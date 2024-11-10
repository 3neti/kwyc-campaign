<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use App\Models\Organization;

class OrganizationData extends Data
{
    public function __construct(
        public int $id,
        public string $name,
    ) {}

    public static function fromModel(Organization $organization): self
    {
        return new self(
            id: $organization->id,
            name: $organization->name
        );
    }
}
