<?php

namespace LocalTools\CoinbaseCommerceSdk\Responses\Checkout\Extra;

class LocalPrice
{
    public ?string $amount;

    public ?string $currency;

    public function __construct(
        ?string $amount,
        ?string $currency
    ) {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['amount'],
            $data['currency']
        );
    }

    public function toArray(): array
    {
        return [
            'amount' => $this->amount,
            'currency' => $this->currency,
        ];
    }
}
