<?php

namespace App\Hyperverge\Exceptions;

class GeneralError extends HypervergeException
{
    protected $message = 'General error';
    protected $code = 4;
}
