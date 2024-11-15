<?php

namespace LocalTools\CoinbaseCommerceSdk\Dtos;

use LocalTools\CoinbaseCommerceSdk\Responses\Checkout\Extra\LocalPrice;

class CreateChargeDto
{
    public string $name;

    public string $description;

    public string $pricing_type;

    public LocalPrice $local_price;

    public ?string $buyer_locale;

    public ?string $cancel_url;

    public ?string $checkout_id;

    public ?array $metadata;

    public ?string $redirect_url;

    public function __construct(
        string $name,
        string $description,
        string $pricing_type,
        LocalPrice $local_price,
        ?string $buyer_locale = null,
        ?string $cancel_url = null,
        ?string $checkout_id = null,
        ?array $metadata = null,
        ?string $redirect_url = null
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->pricing_type = $pricing_type;
        $this->local_price = $local_price;
        $this->buyer_locale = $buyer_locale;
        $this->cancel_url = $cancel_url;
        $this->checkout_id = $checkout_id;
        $this->metadata = $metadata;
        $this->redirect_url = $redirect_url;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'pricing_type' => $this->pricing_type,
            'local_price' => $this->local_price->toArray(),
            'buyer_locale' => $this->buyer_locale,
            'cancel_url' => $this->cancel_url,
            'checkout_id' => $this->checkout_id,
            'metadata' => $this->metadata,
            'redirect_url' => $this->redirect_url,
        ];
    }
}
