<?php

namespace App\Hyperverge\Data;

use Spatie\LaravelData\{Data, Optional};
use App\Hyperverge\Enums\IdType;
use Illuminate\Support\Arr;

class HypervergeData extends Data
{
    public function __construct(
        public string               $status,
        public int                  $statusCode,
        public string               $applicationStatus,
        public WorkflowData         $workflowData,
        public IdModuleData         $idModuleData,
        public SelfieModuleData     $selfieModuleData,
        public FaceMatchModuleData  $faceMatchData
    ) {}

    public static function fromJson(string $json): self
    {
        $data = json_decode($json, true);

        return new self(
            status: Arr::get($data, 'status'),
            statusCode: Arr::get($data, 'statusCode'),
            applicationStatus: Arr::get($data, 'result.applicationStatus'),
            workflowData: WorkflowData::from(Arr::get($data, 'result.workflowDetails')),
            idModuleData: IdModuleData::fromArray($data),
            selfieModuleData: SelfieModuleData::fromArray($data),
            faceMatchData: FaceMatchModuleData::fromArray($data)
        );
    }

    public static function fromArray(array $array): self
    {
        return static::fromJson(json_encode($array));
    }

    public function with(): array
    {
        return [
            'idType' => IdType::tryFrom($this->idModuleData->idCardData->idType)?->name() ?? 'Unknown',
            'fieldsExtracted' => array_filter($this->idModuleData->fieldsExtractedData->toArray()),
            'idImageUrl' => $this->idModuleData->imageUrl,
            'selfieImageUrl' => $this->selfieModuleData->imageUrl,
            'idChecks' => $this->idModuleData->qualityChecksData->toArray(),
            'selfieChecks' => $this->selfieModuleData->qualityChecksData->toArray(),
            'by' => 'lester@hurtado.ph',
        ];
    }
}

class WorkflowData extends Data
{
    public function __construct(
        public string $workflowId,
        public string $version,
    ){}
}

class IdModuleData extends Data
{
    public function __construct(
        public string $module,
        public string $countrySelected,
        public string $documentSelected,
        public int $attempts,
        public string $expectedDocumentSide,
        public string $moduleId,
        public string $croppedImageUrl,
        public string $imageUrl,
        public IdCardData $idCardData,
        public FieldsExtractedData $fieldsExtractedData,
        public QualityChecksData $qualityChecksData
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            module: Arr::get($data, 'result.results.0.module'),
            countrySelected: Arr::get($data, 'result.results.0.countrySelected'),
            documentSelected: Arr::get($data, 'result.results.0.documentSelected'),
            attempts: Arr::get($data, 'result.results.0.attempts'),
            expectedDocumentSide: Arr::get($data, 'result.results.0.expectedDocumentSide'),
            moduleId: Arr::get($data, 'result.results.0.moduleId'),
            croppedImageUrl: Arr::get($data, 'result.results.0.croppedImageUrl'),
            imageUrl: Arr::get($data, 'result.results.0.imageUrl'),
            idCardData: IdCardData::fromArray($data),
            fieldsExtractedData: FieldsExtractedData::from(Arr::get($data, 'result.results.0.apiResponse.result.details.0.fieldsExtracted')),
            qualityChecksData: QualityChecksData::from(Arr::get($data, 'result.results.0.apiResponse.result.details.0.qualityChecks'))
        );
    }
}

class IdCardData extends Data
{
    public function __construct(
        public string $idType,
        public string $idNumber,
        public string $dateOfIssue,
        public string $dateOfExpiry,
        public string $placeOfIssue,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            idType: Arr::get($data, 'result.results.0.apiResponse.result.details.0.idType'),
            idNumber: Arr::get($data, 'result.results.0.apiResponse.result.details.0.fieldsExtracted.idNumber.value'),
            dateOfIssue: Arr::get($data, 'result.results.0.apiResponse.result.details.0.fieldsExtracted.dateOfIssue.value'),
            dateOfExpiry: Arr::get($data, 'result.results.0.apiResponse.result.details.0.fieldsExtracted.dateOfExpiry.value'),
            placeOfIssue: Arr::get($data, 'result.results.0.apiResponse.result.details.0.fieldsExtracted.placeOfIssue.value'),
        );
    }
}

class FieldsExtractedData extends Data
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

class SelfieModuleData extends Data
{
    public function __construct(
        public int $attempts,
        public string $moduleId,
        public string $imageUrl,
        public bool $liveFace,
        public string $confidence,
        public QualityChecksData $qualityChecksData
    ){}

    public static function fromArray(array $data): self
    {
        return new self(
            attempts: Arr::get($data, 'result.results.1.attempts'),
            moduleId: Arr::get($data, 'result.results.1.moduleId'),
            imageUrl: Arr::get($data, 'result.results.1.imageUrl'),
            liveFace: Arr::get($data, 'result.results.1.apiResponse.result.details.liveFace.value'),
            confidence: Arr::get($data, 'result.results.1.apiResponse.result.details.liveFace.confidence'),
            qualityChecksData: QualityChecksData::from(Arr::get($data, 'result.results.1.apiResponse.result.details.qualityChecks')),
        );
    }
}

class QualityChecksData extends Data
{
    public function __construct(
        public string|Optional $blur,
        public string|Optional $glare,
        public string|Optional $blackAndWhite,
        public string|Optional $capturedFromScreen,
        public string|Optional $partialId,
        public string|Optional $eyesClosed,
        public string|Optional $maskPresent,
        public string|Optional $multipleFaces
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

class FaceMatchModuleData extends Data
{
    public function __construct(
        public string $moduleId,
        public string $idImageUrl,
        public string $selfieImageUrl,
        public bool $match,
        public string $confidence
    ){}

    public static function fromArray(array $data): self
    {
        return new self(
            moduleId: Arr::get($data, 'result.results.2.moduleId'),
            idImageUrl: Arr::get($data, 'result.results.2.idImageUrl'),
            selfieImageUrl: Arr::get($data, 'result.results.2.selfieImageUrl'),
            match: Arr::get($data, 'result.results.2.apiResponse.result.details.match.value'),
            confidence: Arr::get($data, 'result.results.2.apiResponse.result.details.match.confidence'),
        );
    }
}
