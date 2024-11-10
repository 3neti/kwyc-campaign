<?php

namespace App\Enums;

use Propaganistas\LaravelPhone\Rules\Phone as PhoneRule;
use Illuminate\Validation\Rule;
use App\Interfaces\RecordType;
use Illuminate\Support\Str;
use App\Traits\EnumUtils;

enum Additional implements RecordType
{
    use EnumUtils;

    case mobile;
    case otp;
    case email;
    case organization;
    case sex;
    case identifier;
    case code;
    case location;
    case answer;
    case choice;
    case amount;
    case rating;
    case miscellaneous;
    case uuid;
    case serial;

    /**
     * @return static
     */
    static function default(): self {
        return self::mobile;
    }

    /**
     * @return string
     */
    public function key(): string
    {
        return Str::lower($this->name);
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return match ($this->name) {
            'otp' => 'OTP',
            default => Str::title($this->name)
        };
    }

    /**
     * @return string
     */
    public function description(): string
    {
        return match($this) {
            Additional::mobile => 'Any valid Philippine mobile e.g. (09xx) xxx-xxxx',
            Additional::otp => 'Add SMS verification of mobile via one-time PIN',
            Additional::email => 'Any valid email address',
            Additional::organization => 'Any organization or institution',
            Additional::sex => 'Biological gender e.g. Male or Female',
            Additional::identifier => 'Any identifier e.g. id number, account number, code name',
            Additional::code => 'Any alphanumeric code e.g. promo code, voucher number, etc.',
            Additional::location => 'Any building, landmark or cross street',
            Additional::answer => 'Any response i.e. fill in the blank',
            Additional::choice => 'Any set e.g. A|B|C|D, True|False, Red|Green|Blue',
            Additional::amount => 'Any amount',
            Additional::rating => 'Any measurable feedback e.g. 0%-100%, A-F, 1.0-5.0, S-VS-G-VG-O-E',
            Additional::miscellaneous => 'Miscellaneous e.g. feedback, query, etc.',
            Additional::uuid => 'Automatic universal unique identifier e.g. 9a8bad11-f36f-4a5d-8a08-b947c3b15be8',
            Additional::serial => 'Serial number e.g. 1,2,3,4,5,6,7',
        };
    }

    /**
     * @return array
     */
    public function attribute_rule(): array
    {
        return match($this) {
            Additional::mobile => ['nullable', 'string', (new PhoneRule)->mobile()->country(config('domain.mobile.allowed.countries'))],
            Additional::otp => ['nullable', 'boolean'],
            Additional::email => ['nullable', 'string', 'email'],
            Additional::organization => ['nullable', 'string'],
            Additional::sex => ['nullable', 'string', Rule::in(['male', 'female'])],
            Additional::identifier, Additional::answer, Additional::choice => ['nullable', 'string', 'max:50'],
            Additional::code, self::rating => ['nullable', 'string', 'max:20'],
            Additional::amount => ['nullable', 'numeric'],
            Additional::location, Additional::miscellaneous => ['nullable', 'string', 'max:480'],
            Additional::uuid => ['nullable', 'uuid'],
            Additional::serial => ['nullable', 'integer'],
        };
    }

    public static function attribute_rules(): array
    {
        $rules = [];
        foreach (Additional::cases() as $additional) {
            $rules[$additional->key()] = $additional->attribute_rule();
        }

        return $rules;
    }

    const tagType = 'additional';
}
