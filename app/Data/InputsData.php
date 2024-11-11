<?php

namespace App\Data;

use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Data;

class InputsData extends Data
{
    public function __construct(
        public string|Optional $mobile,
        public string|Optional $email,
        public string|Optional $organization,
        public string|Optional $sex,
        public string|Optional $identifier,
        public string|Optional $code,
        public string|Optional $location,
        public string|Optional $answer,
        public string|Optional $choice,
        public string|Optional $amount,
        public string|Optional $rating,
        public string|Optional $miscellaneous,
    ) {}
}
