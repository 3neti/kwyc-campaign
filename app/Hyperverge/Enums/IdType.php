<?php

namespace App\Hyperverge\Enums;

enum IdType: string
{
    case LICENSE = 'phl_dl';
    case PASSPORT = 'passport';

    public function name(): string
    {
        return match($this) {
            IdType::LICENSE => "Driver's License",
            IdType::PASSPORT => 'Passport'
        };
    }
}
