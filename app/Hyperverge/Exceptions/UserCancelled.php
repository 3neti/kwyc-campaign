<?php

namespace App\Hyperverge\Exceptions;

class UserCancelled extends HypervergeException
{
    protected $message = 'User cancelled';
    protected $code = 1;

    public function render()
    {
        return redirect(route('checkin-user_cancelled'));
    }
}
