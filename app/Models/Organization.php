<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Parental\HasParent;

/**
 * Class Organization
 *
 * @property int $id
 * @property string $name
 * @property Agent $agent
 * @property Collection $campaigns
 *
 * @method int getKey()
 */
class Organization extends Team
{
    use HasParent;

    public function agent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Agent::class, 'user_id', 'id');
    }

    public function campaigns(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Campaign::class);
    }
}
