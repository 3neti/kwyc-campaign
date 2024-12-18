<?php

namespace App\Models;

use Spatie\MediaLibrary\{HasMedia, MediaCollections\FileAdder, MediaCollections\Models\Media};
use App\Traits\{HasCheckinAttributes, HasCheckinMedia, HasMeta};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\SchemalessAttributes\SchemalessAttributes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


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
 * @property Collection $extracted_fields
 * @property bool $data_retrieved
 * @property bool $user_cancelled
 * @property bool $system_declined
 * @property bool $valid
 * @property array $media
 * @property array $uploads
 * @property Media $idImage
 * @property Media $selfieImage
 * @property SchemalessAttributes $inputs
 *
 * @method int getKey()
 * @method static mixed find($id, $columns = ['*'])
 * @method FileAdder addMediaFromUrl(string $url, array|string ...$allowedMimeTypes)
 * @method FileAdder usingName(string $name)
 * @method FileAdder toMediaCollection(string $collectionName = 'default', string $diskName = '')
 * @method bool updateOrFail(array $attributes = [], array $options = [])
 */
class Checkin extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\CheckinFactory> */
    use HasCheckinAttributes;
    use HasCheckinMedia;
    use HasFactory;
    use HasUuids;
    use HasMeta;

    const FIELDS_EXTRACTED_INDEX = 'result.results.0.apiResponse.result.details.0';

    const FACE_MATCH_INDEX = 'result.results.2';

    protected $fillable = [
        'url', 'data', 'valid_until', 'inputs'
    ];

    protected $casts = [
        'data' => 'array',
        'data_retrieved_at' => 'datetime',
        'inputs' => \Spatie\SchemalessAttributes\Casts\SchemalessAttributes::class,
    ];

    public function campaign(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }

    public function extracted_fields(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ExtractedField::class);
    }

    public function scopeWithInputs(): Builder
    {
        return $this->inputs->modelScope();
    }
}
