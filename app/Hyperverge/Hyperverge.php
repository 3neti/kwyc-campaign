<?php

namespace App\Hyperverge;

class Hyperverge
{
    public static string $workflowId = '';

    public static string $requestKYCURLEndPoint = '';

    public static string $resultKYCResultEndpoint = '';

    public static array $inputs = [];

    public static array $languages = [];

    public static string $defaultLanguage = '';

    public static string $expiry = '';

    protected Action $action = Action::Request;

    public function __construct(protected string $appId, protected string $appKey){}

    public function headers(): array
    {
        return [
            'appId' => $this->appId,
            'appKey' => $this->appKey
        ];
    }

    public function url(): string
    {
        return $this->getAction()->url();
    }

    public function body(string $transactionId): array
    {
        return array_merge(compact('transactionId'), $this->getAction()->body());
    }

    public function getAction(): Action
    {
        return $this->action;
    }

    public function setAction(Action $action): Hyperverge
    {
        $this->action = $action;

        return $this;
    }

    public function setWorkflowId(string $workflowId = null): self
    {
        if ($workflowId)
            self::$workflowId = $workflowId;

        return $this;
    }
}
