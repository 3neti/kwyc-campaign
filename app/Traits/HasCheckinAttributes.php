<?php

namespace App\Traits;

trait HasCheckinAttributes
{
    public function setDataRetrievedAttribute(bool $value): self
    {
        $this->setAttribute('data_retrieved_at', $value ? now() : null);

        return $this;
    }

    public function getDataRetrievedAttribute(): bool
    {
        return $this->getAttribute('data_retrieved_at')
            && $this->getAttribute('data_retrieved_at') <= now();
    }

    public function setUserCancelledAttribute(bool $value): self
    {
        $this->setAttribute('user_cancelled_at', $value ? now() : null);

        return $this;
    }

    public function getUserCancelledAttribute(): bool
    {
        return $this->getAttribute('user_cancelled_at')
            && $this->getAttribute('user_cancelled_at') <= now();
    }

    public function setSystemDeclinedAttribute(bool $value): self
    {
        $this->setAttribute('system_declined_at', $value ? now() : null);

        return $this;
    }

    public function getSystemDeclinedAttribute(): bool
    {
        return $this->getAttribute('system_declined_at')
            && $this->getAttribute('system_declined_at') <= now();
    }
}
