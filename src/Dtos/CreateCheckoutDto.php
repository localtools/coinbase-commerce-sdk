<?php

namespace LocalTools\CoinbaseCommerceSdk\Dtos;

use LocalTools\CoinbaseCommerceSdk\Enums\RequestedInfoEnum;

class CreateCheckoutDto
{
    public string $buyer_locale;

    public array $total_price;

    public array $metadata;

    public string $pricing_type;

    public RequestedInfoEnum $requested_info;

    public function __construct(
        string $buyer_locale,
        array $total_price,
        array $metadata,
        string $pricing_type,
        RequestedInfoEnum $requested_info
    ) {
        $this->buyer_locale = $buyer_locale;
        $this->total_price = $total_price;
        $this->metadata = $metadata;
        $this->pricing_type = $pricing_type;
        $this->requested_info = $requested_info;
    }

    public function toArray(): array
    {
        return [
            'buyer_locale' => $this->buyer_locale,
            'total_price' => $this->total_price,
            'metadata' => $this->metadata,
            'pricing_type' => $this->pricing_type,
            'requested_info' => $this->requested_info,
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['buyer_locale'],
            $data['total_price'],
            $data['metadata'],
            $data['pricing_type'],
            $data['requested_info']
        );
    }
}
