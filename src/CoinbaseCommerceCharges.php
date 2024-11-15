<?php

namespace LocalTools\CoinbaseCommerceSdk;

use GuzzleHttp\Exception\GuzzleException;
use LocalTools\CoinbaseCommerceSdk\Dtos\CreateChargeDto;
use LocalTools\CoinbaseCommerceSdk\Exceptions\NotFoundException;
use LocalTools\CoinbaseCommerceSdk\Requests\HttpClient;
use LocalTools\CoinbaseCommerceSdk\Responses\Charge\ChargeResponse;
use LocalTools\CoinbaseCommerceSdk\Utils\Log;

/**
 * Class CoinbaseCommerceCharges
 */
class CoinbaseCommerceCharges
{
    protected bool $logs;

    protected HttpClient $api;

    public function __construct(HttpClient $api, bool $logs = false)
    {
        $this->api = $api;
        $this->logs = $logs;
    }

    /**
     * Returns all charges
     *
     * @throws GuzzleException
     * @throws NotFoundException
     */
    public function retrieveAllCharges(): array
    {
        $response = $this->api->get('CoinbaseCommerce@retrieveAllCharges', '/charges', [], $this->logs);
        if ($response->getStatusCode() === 404) {
            throw new NotFoundException;
        }
        $data = json_decode($response->getBody()->getContents(), true);
        if (! isset($data['data'])) {
            return [];
        }

        $charges = [];

        foreach ($data['data'] as $charge) {
            try {
                $charges[] = ChargeResponse::fromArray($charge);
            } catch (\Exception $e) {
                Log::make()->error($e->getMessage(), $e->getTrace());

                continue;
            }
        }

        return $charges;
    }

    /**
     * Returns the charge with the order code
     *
     * @throws GuzzleException
     * @throws NotFoundException
     */
    public function retrieveCharge(string $charge_code_or_charge_id): ChargeResponse
    {
        $response = $this->api->get('CoinbaseCommerce@retrieveCharge:charge_code_or_charge_id', "/charges/{$charge_code_or_charge_id}", [], $this->logs);
        if ($response->getStatusCode() === 404) {
            throw new NotFoundException;
        }
        $data = json_decode($response->getBody()->getContents(), true);
        if (! isset($data['data'])) {
            throw new NotFoundException;
        }

        return ChargeResponse::fromArray($data['data']);
    }

    /**
     * Create a Charge
     *
     * @throws GuzzleException
     */
    public function createCharge(CreateChargeDto $data): ChargeResponse
    {
        $response = $this->api->post('CoinbaseCommerce@createCharge', '/charges', $data->toArray(), $this->logs);
        $data = json_decode($response->getBody()->getContents(), true);

        return ChargeResponse::fromArray($data['data']);
    }
}
