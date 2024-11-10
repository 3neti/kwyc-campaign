<?php

namespace App\Models;

use App\Interfaces\CampaignUser;
use App\Traits\{HasCampaigns, HasOrganizations};
use Illuminate\Database\Eloquent\Collection;
use Parental\HasParent;

/**
 * Class Agent
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $mobile
 * @property int $current_team_id
 * @property Collection $organizations
 * @property Collection $ownedOrganizations
 * @property Organization $currentOrganization
 * @property AgentOrganization $organizationCampaigns
 *
 * @property Campaign $currentCampaign
 *
 * @method int getKey()
 */
class Agent extends User implements CampaignUser
{
    use HasOrganizations;
    use HasCampaigns;
    use HasParent;
}
