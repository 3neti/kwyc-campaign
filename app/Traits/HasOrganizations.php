<?php

namespace App\Traits;

use App\Models\{AgentOrganization, Organization};

trait HasOrganizations
{
    public function organizations(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->teams();
    }

    public function ownedOrganizations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Organization::class);
    }

    public function allOrganizations(): \Illuminate\Support\Collection
    {
        return $this->ownedOrganizations->merge($this->organizations)->sortBy('name');
    }

    /**
     * @throws \ReflectionException
     */
    public function ownsOrganization(mixed $organization): bool
    {
        if (is_null($organization)) {
            return false;
        }

        return $this->id == $organization->{$this->getForeignKey()};
    }

    public function personalOrganization(): Organization
    {
        return $this->ownedOrganizations->where('personal_team', true)->first();
    }

    /**
     * @throws \ReflectionException
     */
    public function belongsToOrganization(mixed $organization): bool
    {
        if (is_null($organization)) {
            return false;
        }

        return $this->ownsOrganization($organization) || $this->organizations->contains(function ($t) use ($organization) {
                return $t->id === $organization->id;
            });
    }

    /**
     * @throws \ReflectionException
     */
    public function switchOrganization(mixed $organization): bool
    {
        if (! $this->belongsToOrganization($organization)) {
            return false;
        }

        $this->forceFill([
            'current_team_id' => $organization->id,
        ])->save();

        $this->setRelation('currentOrganization', $organization);

        return true;
    }

    /**
     * @throws \ReflectionException
     */
    public function currentOrganization(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        if (is_null($this->current_team_id) && $this->id) {
            $this->switchOrganization($this->personalOrganization());
        }

        return $this->belongsTo(Organization::class, 'current_team_id');
    }

    public function organizationCampaigns(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this
            ->belongsToMany(Organization::class, 'agent_organization')
            ->using(AgentOrganization::class)
            ->withPivot('campaign_id')->withTimestamps()
            ;
    }
}
