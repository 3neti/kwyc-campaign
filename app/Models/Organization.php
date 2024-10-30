<?php

namespace App\Models;

use Parental\HasParent;

/**
 * Class Organization
 *
 * @property int $id
 * @property string $name
 *
 * @method int getKey()
 */
class Organization extends Team
{
    use HasParent;
}
