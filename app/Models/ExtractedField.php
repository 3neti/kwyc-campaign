<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Thiagoprz\CompositeKey\HasCompositeKey;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ExtractedField
 *
 * @property string $checkin_id
 * @property string $field
 * @property array $value
 *
 * @method int getKey()
 * @method mixed find(array $ids)
 */
class ExtractedField extends Model
{
    /** @use HasFactory<\Database\Factories\ExtractedFieldFactory> */
    use HasCompositeKey;
    use HasFactory;

    public $incrementing = false;

    public $timestamps = false;

    protected $primaryKey = [
        'checkin_id',
        'field'
    ];

    protected $fillable = [
        'field',
        'value'
    ];

    public function checkin(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Checkin::class);
    }
}
