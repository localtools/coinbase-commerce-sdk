<?php

namespace LocalTools\CoinbaseCommerceSdk;

use GuzzleHttp\Exception\GuzzleException;
use LocalTools\CoinbaseCommerceSdk\Dtos\CreateCheckoutDto;
use LocalTools\CoinbaseCommerceSdk\Requests\HttpClient;
use LocalTools\CoinbaseCommerceSdk\Responses\Checkout\CreateCheckoutResponse;
use LocalTools\CoinbaseCommerceSdk\Responses\Checkout\GetCheckoutsResponse;

/**
 * Class CoinbaseCommerceCheckouts
 */
class CoinbaseCommerceCheckouts
{
    protected bool $logs;

    protected HttpClient $api;

    /**
     * CoinbaseCommerceCheckouts constructor.
     */
    public function __construct(HttpClient $api, bool $logs = false)
    {
        $this->api = $api;
        $this->logs = $logs;
    }

    /**
     * Returns all checkout sessions
     *
     * @throws GuzzleException
     */
    public function listCheckouts(): array
    {
        $response = $this->api->get('CoinbaseCommerce@listCheckouts', '/checkouts', [], $this->logs);
        $data = json_decode($response->getBody()->getContents(), true);

        if (! isset($data['data'])) {
            return [];
        }
        $data = $data['data'];

        $checkouts = [];

        foreach ($data as $checkout) {
            $checkouts[] = GetCheckoutsResponse::fromArray($checkout);
        }

        return $checkouts;
    }

    /**
     * Returns a specific checkout session
     *
     * @throws GuzzleException
     */
    public function getCheckout(string $checkoutId): GetCheckoutsResponse
    {
        $response = $this->api->get('CoinbaseCommerce@getCheckout', "/checkouts/{$checkoutId}", [], $this->logs);
        $data = json_decode($response->getBody()->getContents(), true);

        return GetCheckoutsResponse::fromArray($data['data']);
    }

    /**
     * Creates a new checkout
     *
     * @throws GuzzleException
     */
    public function createCheckout(CreateCheckoutDto $data): CreateCheckoutResponse
    {
        $response = $this->api->post('CoinbaseCommerce@createCheckout', '/checkouts', $data->toArray(), $this->logs);
        $data = json_decode($response->getBody()->getContents(), true);

        return CreateCheckoutResponse::fromArray($data['data']);
    }
}
