<?php

namespace App\Hyperverge\Exceptions;

class NeedsReview extends HypervergeException
{
    protected $message = 'Needs Review';
    protected $code = 3;
}
