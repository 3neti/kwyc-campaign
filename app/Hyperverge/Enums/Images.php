<?php

namespace App\Hyperverge\Enums;

enum Images: string
{
    case ID_IMAGE = 'idImage';
    case SELFIE_IMAGE = 'selfieImage';

    public function index(): string
    {
        return match ($this) {
            Images::ID_IMAGE => 'idImageUrl',
            Images::SELFIE_IMAGE => 'selfieImageUrl'
        };
    }
}
