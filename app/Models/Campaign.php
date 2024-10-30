<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\SchemalessAttributes\SchemalessAttributes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Traits\HasMeta;

/**
 * Class Campaign
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $mobile
 * @property string $webhook
 * @property Carbon $enabled_at
 * @property Carbon $valid_until
 * @property SchemalessAttributes $meta
 * @property Agent $agent
 * @property Organization $organization
 * @property string $url
 * @property bool $enabled
 * @property bool $valid
 *
 * @method int getKey()
 */
class Campaign extends Model
{
    /** @use HasFactory<\Database\Factories\CampaignFactory> */
    use HasFactory;
    use HasUuids;
    use HasMeta;

    protected $fillable = [
        'name'
    ];

    public function agent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Agent::class, 'user_id');
    }

    public function organization(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Organization::class, 'team_id');
    }

    public function getUrlAttribute(): string
    {
        return route('campaign-checkin', ['campaign' => $this->id]);
    }

    public function setEnabledAttribute(bool $value): self
    {
        $this->setAttribute('enabled_at', $value ? now() : null);

        return $this;
    }

    public function getEnabledAttribute(): bool
    {
        return $this->getAttribute('enabled_at')
            && $this->getAttribute('enabled_at') <= now();
    }

    public function getValidAttribute(): bool
    {
        $invalid = $this->getAttribute('valid_until')
            && $this->getAttribute('valid_until') <= now();

        return ! $invalid;
    }
}
