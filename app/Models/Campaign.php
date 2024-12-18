<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\SchemalessAttributes\SchemalessAttributes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Traits\{HasCampaignAttributes, HasMeta};
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Enums\Additional;
use Spatie\Tags\HasTags;

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
 * @property string $qrcode_uri
 * @property bool $enabled
 * @property bool $valid
 * @property array $inputAttributes
 * @property string $splash
 * @property string $rider
 *
 * @method int getKey()
 * @method static mixed find($id, $columns = ['*'])
 * @method void notify($instance)
 */
class Campaign extends Model
{
    /** @use HasFactory<\Database\Factories\CampaignFactory> */
    use HasCampaignAttributes;
    use HasFactory;
    use Notifiable;
    use HasUuids;
    use HasMeta;
    use HasTags;

    protected $fillable = [
        'name', 'email', 'mobile', 'webhook', 'splash', 'rider'
    ];

    public function agent(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    public function organization(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Organization::class, 'team_id');
    }

    public function checkins(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Checkin::class);
    }

    public function routeNotificationForEngageSpark(): string
    {
        return $this->mobile;
    }

    public function routeNotificationForWebhook(): string
    {
        return $this->webhook;
    }

    public function routeNotificationForSlack(Notification $notification): mixed
    {
        return '#kwyc-campaign';
    }

    public function team(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function getInputAttributesAttribute(): array
    {
        return $this->tagsWithType(type: Additional::tagType)->pluck('name')->toArray();
    }

    public function setInputAttributesAttribute(array $value): static
    {
        $this->syncTagsWithType(tags: $value, type: Additional::tagType);

        return $this;
    }
}
