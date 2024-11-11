<?php

namespace App\Hyperverge\Data;

use App\Hyperverge\Pipes\Filters\AssociativeArray\{RemoveNulls, UpdateKeysFromSnakeToTitle, UpdateKeysToLowercase};
use App\Hyperverge\Pipes\Filters\Text\{LookupIdType, StudlyToTitle};
use Spatie\LaravelData\Attributes\MapInputName;
use App\Hyperverge\Enums\HypervergeModule;
use App\Hyperverge\Interfaces\Profileable;
use Spatie\LaravelData\{Data, Optional};
use JetBrains\PhpStorm\ArrayShape;
use Illuminate\Support\{Arr, Str};
use Illuminate\Pipeline\Pipeline;
use Throwable;


/**
 * @deprecated
 */
class KYCData extends Data implements Profileable
{
    public static bool $rawIdType = true;
    public static bool $rawFieldsExtracted = true;

    public function __construct(
        public string $status,
        public int $statusCode,
        public array $metadata,
        #[MapInputName('result')]
        public ApplicationData $application
    ) {}

    #[ArrayShape(['idType' => "null|string", 'fieldsExtracted' => "array|null", 'idImageUrl' => "null|string", 'selfieImageUrl' => "null|string", 'idChecks' => "array|null", 'selfieChecks' => "array|null", 'by' => "mixed"])]
    public function with(): array
    {
        return [
            'idType' => $this->getIdType(),
            'fieldsExtracted' => $this->getFieldsExtracted(),
            'idImageUrl' => $this->getIdImageUrl(),
            'selfieImageUrl' => $this->getSelfieImageUrl(),
            'idChecks' => $this->getIDChecks(),
            'selfieChecks' => $this->getSelfieChecks(),
            'by' => 'lester@hurtado.ph',
        ];
    }

    public function getDetails(HypervergeModule $module): DetailData
    {
        foreach ($this->application->modules as $applicationModule) {
            if ($applicationModule->moduleId == $module) {
                return $applicationModule->apiResponse->result->details;
            }
        }

//        return $this->application
//            ->modules[$module->value]
//            ->apiResponse
//            ->result
//            ->details;
    }

    public function getFieldsExtracted($raw = null): ?array
    {
        $raw = $raw ?? self::$rawFieldsExtracted;
        $fieldsExtracted = $this->getDetails(HypervergeModule::ID_VERIFICATION)->fieldsExtracted->toArray();

        return $raw ? $fieldsExtracted : app(Pipeline::class)
            ->send($fieldsExtracted)
            ->through([
                RemoveNulls::class,
//                UpdateKeysFromSnakeToTitle::class
            ])
            ->thenReturn();
    }

    public function getIdImageUrl(): ?string
    {
        return $this->application
            ->modules[HypervergeModule::ID_VERIFICATION->value]
            ->imageUrl
            ?? null;
    }

    public function getSelfieImageUrl(): ?string
    {
        return $this->application
                ->modules[HypervergeModule::SELFIE_VERIFICATION->value]
                ->imageUrl
            ?? null;
    }

    public function getIDChecks(): ?array
    {
        return ($this->getDetails(HypervergeModule::ID_VERIFICATION)->qualityChecks instanceof Optional)
            ? []
            : app(Pipeline::class)
            ->send($this->getDetails(HypervergeModule::ID_VERIFICATION)->qualityChecks->toArray())
            ->through([
                RemoveNulls::class,
                UpdateKeysFromSnakeToTitle::class,
                UpdateKeysToLowercase::class
            ])
            ->thenReturn();
    }

    public function getSelfieChecks(): ?array
    {
        return ($this->getDetails(HypervergeModule::SELFIE_VERIFICATION)->qualityChecks instanceof Optional)
            ? []
            : app(Pipeline::class)
            ->send($this->getDetails(HypervergeModule::SELFIE_VERIFICATION)->qualityChecks->toArray())
            ->through([
                RemoveNulls::class,
                UpdateKeysFromSnakeToTitle::class,
                UpdateKeysToLowercase::class
            ])
            ->thenReturn();
    }

    public function getIdType($raw = null): string
    {
        $raw = $raw ?? self::$rawIdType;
        $idType = $this->getDetails(HypervergeModule::ID_VERIFICATION)->idType;

        return $raw ? $idType : app(Pipeline::class)
            ->send($idType)
            ->through([
                LookupIdType::class,
                StudlyToTitle::class,
            ])
            ->thenReturn();
    }

    /**
     * @throws Throwable
     */
    public function getName(): string
    {
        $fullName = Arr::get($this->getFieldsExtracted(), 'fullName');

        return $fullName;
        return match ($this->getIdType()) {
            'phl_dl' => surname_first_to_first_name_first($fullName),
            default => $fullName,
        };
    }

    public function getAddress(): string
    {
        return Str::of(Arr::get($this->getFieldsExtracted(), 'address'))->title();
    }

    public function getBirthdate(): string
    {
       return Arr::get($this->getFieldsExtracted(), 'dateOfBirth');
    }
}
