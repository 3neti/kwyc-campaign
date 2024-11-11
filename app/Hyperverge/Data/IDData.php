<?php

namespace App\Hyperverge\Data;

use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Attributes\WithCast;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
use DateTime;
use Spatie\LaravelData\Optional;

/**
 * @deprecated
 */
class IDData extends Data
{
    public function __construct(
        public ?string $type,
        public ?string $idNumber,
        public ?string $dateOfIssue,
        public ?string $dateOfExpiry,
        public ?string $countryCode,
        public ?string $mrzString,

        public ?string $firstName,
        public ?string $middleName,
        public ?string $lastName,
        public ?string $fullName,
//        #[WithCast(DateTimeInterfaceCast::class, format: 'd-m-Y')]
//        public ?DateTime $dateOfBirth,
        public ?string $dateOfBirth,

        public ?string $address,
        public ?string $gender,

        public ?string $placeOfBirth,
        public ?string $placeOfIssue,
        public ?int $yearOfBirth,
        public ?string $age,
        public ?string $fatherName,
        public ?string $motherName,
        public ?string $husbandName,
        public ?string $spouseName,
        public ?string $nationality,

        public ?string $homeTown,
    ) {}

    public static function prepareForPipeline(array $properties) : array
    {
        foreach ($properties as $property => $value) {
            $val = empty($value['value']) ? null : $value['value'];
            $properties[$property] = $val;
        }

        return $properties;
    }
}
