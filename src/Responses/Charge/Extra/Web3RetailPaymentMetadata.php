<?php

namespace LocalTools\CoinbaseCommerceSdk\Responses\Charge\Extra;

class Web3RetailPaymentMetadata
{
    public ?string $quote_id;

    public ?SourceAmount $source_amount;

    public ?ExchangeRate $exchange_rate_with_spread;

    public ?ExchangeRate $exchange_rate_without_spread;

    public int $max_retail_payment_value_usd;

    public array $fees;

    public array $high_value_payment_currencies;

    public function __construct(
        ?string $quote_id,
        ?SourceAmount $source_amount,
        ?ExchangeRate $exchange_rate_with_spread,
        ?ExchangeRate $exchange_rate_without_spread,
        int $max_retail_payment_value_usd,
        array $fees,
        array $high_value_payment_currencies
    ) {
        $this->quote_id = $quote_id;
        $this->source_amount = $source_amount;
        $this->exchange_rate_with_spread = $exchange_rate_with_spread;
        $this->exchange_rate_without_spread = $exchange_rate_without_spread;
        $this->max_retail_payment_value_usd = $max_retail_payment_value_usd;
        $this->fees = $fees;
        $this->high_value_payment_currencies = $high_value_payment_currencies;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['quote_id'],
            isset($data['source_amount']) ? SourceAmount::fromArray($data['source_amount']) : null,
            isset($data['exchange_rate_with_spread']) ? ExchangeRate::fromArray($data['exchange_rate_with_spread']) : null,
            isset($data['exchange_rate_without_spread']) ? ExchangeRate::fromArray($data['exchange_rate_without_spread']) : null,
            $data['max_retail_payment_value_usd'],
            $data['fees'],
            $data['high_value_payment_currencies']
        );
    }

    public function toArray(): array
    {
        return [
            'quote_id' => $this->quote_id,
            'source_amount' => $this->source_amount ? $this->source_amount->toArray() : null,
            'exchange_rate_with_spread' => $this->exchange_rate_with_spread ? $this->exchange_rate_with_spread->toArray() : null,
            'exchange_rate_without_spread' => $this->exchange_rate_without_spread ? $this->exchange_rate_without_spread->toArray() : null,
            'max_retail_payment_value_usd' => $this->max_retail_payment_value_usd,
            'fees' => $this->fees,
            'high_value_payment_currencies' => $this->high_value_payment_currencies,
        ];
    }
}
