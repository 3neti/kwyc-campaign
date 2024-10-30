<?php

namespace App\Models;

use Parental\HasParent;

/**
 * Class Agent
 *
 * @property int $id
 * @property string $name
 *
 * @method int getKey()
 */
class Agent extends User
{
    use HasParent;
}
