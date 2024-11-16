<?php

namespace App\Hyperverge\Exceptions;

class AutoDeclined extends HypervergeException
{
    protected $message = 'Auto declined';
    protected $code = 2;
}
