<?php

namespace App\Interfaces;

use App\Models\Campaign;
use App\Models\Organization;

interface CampaignUser
{
    public function organizations(): \Illuminate\Database\Eloquent\Relations\BelongsToMany;

    public function ownedOrganizations(): \Illuminate\Database\Eloquent\Relations\HasMany;

    public function allOrganizations(): \Illuminate\Support\Collection;

    public function ownsOrganization(mixed $organization): bool;

    public function personalOrganization(): Organization;

    public function belongsToOrganization(mixed $organization): bool;

    public function switchOrganization(mixed $organization): bool;

    public function currentOrganization(): \Illuminate\Database\Eloquent\Relations\BelongsTo;

    public function organizationCampaigns(): \Illuminate\Database\Eloquent\Relations\BelongsToMany;

    public function currentCampaign(): \Illuminate\Database\Eloquent\Relations\BelongsTo;

    public function isCurrentCampaign(Campaign $campaign): bool;

    public function ownsCampaign(Campaign $campaign): bool;

    public function belongsToCampaign(Campaign $campaign): bool;

    public function setOrganizationCampaignBookmark(Organization $organization, Campaign $campaign): array;

    public function getOrganizationCampaignBookmark(Organization $organization): ?Campaign;

    public function switchCampaign(Campaign $campaign): bool;
}
