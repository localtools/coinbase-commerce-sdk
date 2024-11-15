<?php

namespace LocalTools\CoinbaseCommerceSdk;

use LocalTools\CoinbaseCommerceSdk\Exceptions\AccessTokenException;
use LocalTools\CoinbaseCommerceSdk\Requests\HttpClient;

class CoinbaseCommerce
{
    protected bool $logs;

    protected HttpClient $api;

    public CoinbaseCommerceCheckouts $checkouts;

    public CoinbaseCommerceCharges $charges;

    public CoinbaseCommerceEvents $events;

    /**
     * @throws AccessTokenException
     */
    public function __construct(
        ?string $accessToken = null,
        ?bool $logs = false,
        ?string $baseUri = 'https://api.commerce.coinbase.com'
    ) {
        $this->logs = $logs;
        if (! $accessToken) {
            throw new AccessTokenException;
        }
        $options = [
            'base_uri' => $baseUri,
            'headers' => [
                'access_token' => $accessToken,
                'X-CC-Api-Key' => $accessToken,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            'http_errors' => false,
        ];

        $this->api = HttpClient::make('CoinbaseCommerceSdk', $options, $this->logs);

        $this->checkouts = new CoinbaseCommerceCheckouts($this->api);
        $this->charges = new CoinbaseCommerceCharges($this->api);
        $this->events = new CoinbaseCommerceEvents($this->api);
    }

    /**
     * @throws AccessTokenException
     */
    public static function make(?string $accessToken = null,
        ?string $baseUri = null): CoinbaseCommerce
    {
        return new CoinbaseCommerce($accessToken, $baseUri);
    }
}
