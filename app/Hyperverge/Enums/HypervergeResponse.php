<?php

namespace App\Hyperverge\Enums;

enum HypervergeResponse: string
{
    case USER_CANCELLED = 'user_cancelled';
    case ERROR = 'error';
    case AUTO_APPROVED = 'auto_approved';
    case AUTO_DECLINED = 'auto_declined';
    case NEEDS_REVIEW = 'needs_review';
}
