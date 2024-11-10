<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\{Campaign, Organization};

trait HasCampaigns
{
    /**
     * Get the current campaign of the agent's context.
     *
     * @return BelongsTo
     */
    public function currentCampaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class, 'current_campaign_id');
    }

    /**
     * Determine if the given team is the current team.
     *
     * @param  Campaign $campaign
     * @return bool
     */
    public function isCurrentCampaign(Campaign $campaign): bool
    {
        return $campaign->id === $this->currentCampaign->id;
    }

    /**
     * Determine if the agent owns the given campaign.
     *
     * @param Campaign $campaign
     * @return bool
     * @throws \ReflectionException
     */
    public function ownsCampaign(Campaign $campaign): bool
    {
        if (is_null($campaign)) {
            return false;
        }

        return $this->id == $campaign->{$this->getForeignKey()};
    }

    /**
     * Determine if the agent belongs to the given campaign.
     *
     * @param Campaign $campaign
     * @return bool
     * @throws \ReflectionException
     */
    public function belongsToCampaign(Campaign $campaign): bool
    {
        if (is_null($campaign)) {
            return false;
        }

        return $this->ownsCampaign($campaign) || $this->campaigns->contains(function ($c) use ($campaign) {
                return $c->id === $campaign->id;
            });
    }

    /**
     * @param Organization $organization
     * @param Campaign $campaign
     * @return array
     */
    public function setOrganizationCampaignBookmark(Organization $organization, Campaign $campaign): array
    {
        return $this->organizationCampaigns()->syncWithoutDetaching([
            $organization->id => [
                'campaign_id' => $campaign->id
            ]
        ]);
    }

    /**
     * @param Organization $organization
     * @return Campaign|null
     */
    public function getOrganizationCampaignBookmark(Organization $organization): ?Campaign
    {
        if ($campaign = $this->organizationCampaigns()->where('team_id', $organization->id)->first()?->pivot->campaign) {
            return $campaign;
        }
        else {
            return $organization->campaigns->first();
        }
    }

    /**
     * Switch the agent's context to the given campaign.
     *
     * @param Campaign $campaign
     * @return bool
     * @throws \ReflectionException
     */
    public function switchCampaign(Campaign $campaign): bool
    {
        if (! $this->belongsToCampaign($campaign)) {
            return false;
        }

        $this->setOrganizationCampaignBookmark($this->currentOrganization, $campaign);

        $this->forceFill([
            'current_campaign_id' => $campaign->id,
        ])->save();

        $this->setRelation('currentCampaign', $campaign);

        return true;
    }
}
