<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\SchemalessAttributes\SchemalessAttributes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasCheckinAttributes;
use Illuminate\Support\Carbon;
use App\Traits\HasMeta;

/**
 * Class Checkin
 *
 * @property string $id
 * @property string $url
 * @property array $data
 * @property Carbon $data_retrieved_at
 * @property Carbon $user_cancelled_at
 * @property Carbon $system_declined_at
 * @property Carbon $valid_until
 * @property SchemalessAttributes $meta
 * @property Campaign $campaign
 * @property bool $data_retrieved
 * @property bool $user_cancelled
 * @property bool $system_declined
 *
 * @method int getKey()
 * @method static mixed find($id, $columns = ['*'])
 */
class Checkin extends Model
{
    /** @use HasFactory<\Database\Factories\CheckinFactory> */
    use HasCheckinAttributes;
    use HasFactory;
    use HasUuids;
    use HasMeta;

    protected $fillable = [
        'url', 'data', 'data_retrieved_at'
    ];

    protected $casts = [
        'data' => 'array'
    ];

    public function campaign(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }
}
