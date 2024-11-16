<?php

namespace App\Hyperverge\Exceptions;

use App\Hyperverge\Enums\HypervergeResponse;
use ReflectionClass;
use Exception;

class HypervergeException extends Exception
{
    protected $message = 'Hope to see you again - soon.';
    protected $code = 0;
    protected string $transactionId;

    public function __construct(string $transactionId)
    {
        $this->transactionId = $transactionId;

        parent::__construct($this->message, $this->code, null);
    }

    public static function createFromResponse(HypervergeResponse $response, string $transactionId): ?HypervergeException
    {
        return match ($response) {
            HypervergeResponse::USER_CANCELLED => new UserCancelled($transactionId),
            HypervergeResponse::AUTO_DECLINED => new AutoDeclined($transactionId),
            HypervergeResponse::NEEDS_REVIEW => new NeedsReview($transactionId),
            HypervergeResponse::ERROR => new GeneralError($transactionId),
            default => null
        };
    }

    public function render()
    {
        return inertia()->render('Exceptions/Show' , [
            'exception' => (new ReflectionClass($this))->getShortName(),
            'message' => $this->message,
            'context' => $this->transactionId,
            'code' => $this->code
        ]);
    }
}
