<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\SchemalessAttributes\SchemalessAttributes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Traits\{HasCampaignAttributes, HasMeta};
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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

    protected $fillable = [
        'name', 'email', 'mobile', 'webhook'
    ];

    public function agent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Agent::class, 'user_id');
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
}
