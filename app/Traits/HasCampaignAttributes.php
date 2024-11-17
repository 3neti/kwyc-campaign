<?php

namespace App\Traits;

trait HasCampaignAttributes
{
    public function getUrlAttribute(): string
    {
        return route('campaign-checkin', ['campaign' => $this->id]);
    }

    public function setEnabledAttribute(bool $value): self
    {
        $this->setAttribute('enabled_at', $value ? now() : null);

        return $this;
    }

    public function getEnabledAttribute(): bool
    {
        return $this->getAttribute('enabled_at')
            && $this->getAttribute('enabled_at') <= now();
    }

    public function getValidAttribute(): bool
    {
        $invalid = $this->getAttribute('valid_until')
            && $this->getAttribute('valid_until') <= now();

        return ! $invalid;
    }

    public function getQRCodeURIAttribute(): string
    {
        return generateQRCodeURI(data: $this->url, logo: images_path('id-mark.png'));
    }

    public function setSplashAttribute(?string $value): self
    {
        $this->meta->set('splash', $value);

        return $this;
    }

    public function getSplashAttribute(): ?string
    {
        return $this->meta->get('splash');
    }

    public function setRiderAttribute(?string $value): self
    {
        $this->meta->set('rider', $value);

        return $this;
    }

    public function getRiderAttribute(): ?string
    {
        return $this->meta->get('rider');
    }
}
