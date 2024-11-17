<?php

namespace App\Hyperverge\Enums;

use App\Hyperverge\Hyperverge;

enum Action
{
    case Request;
    case Result;

    public function url(): string
    {
        return match ($this) {
            Action::Request => Hyperverge::$requestKYCURLEndPoint,
            Action::Result => Hyperverge::$resultKYCResultEndpoint
        };
    }

    public function body(): array
    {
        return match ($this) {
            Action::Request => [
                'workflowId' => Hyperverge::$workflowId,
                'redirectUrl' => route('hyperverge-callback'),
                'inputs' => Hyperverge::$inputs,
                'languages' => Hyperverge::$languages,
                'defaultLanguage' => Hyperverge::$defaultLanguage,
                'expiry' => Hyperverge::$expiry,
            ],
            Action::Result => []
        };
    }
}
