<?php

namespace LocalTools\CoinbaseCommerceSdk\Responses\Checkout\Extra;

class MaxContributionAmount
{
    public string $amount;

    public string $currency;

    public function __construct(
        string $amount,
        string $currency
    ) {
        $this->amount = $amount;
        $this->currency = $currency;
    }
}
