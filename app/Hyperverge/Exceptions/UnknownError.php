<?php

namespace App\Hyperverge\Exceptions;

class UnknownError extends HypervergeException
{
    protected $message = 'Unknown Error';
    protected $code = 5;
}
