<?php

namespace LocalTools\CoinbaseCommerceSdk;

use GuzzleHttp\Exception\GuzzleException;
use LocalTools\CoinbaseCommerceSdk\Exceptions\NotFoundException;
use LocalTools\CoinbaseCommerceSdk\Requests\HttpClient;
use LocalTools\CoinbaseCommerceSdk\Responses\Events\EventResponse;
use LocalTools\CoinbaseCommerceSdk\Utils\Log;

/**
 * Class CoinbaseCommerceEvents
 */
class CoinbaseCommerceEvents
{
    protected bool $logs;

    protected HttpClient $api;

    public function __construct(HttpClient $api, bool $logs = false)
    {
        $this->api = $api;
        $this->logs = $logs;
    }

    /**
     * List events
     *
     * @throws GuzzleException
     * @throws NotFoundException
     */
    public function retrieveAllEvents(): array
    {
        $response = $this->api->get('CoinbaseCommerce@retrieveAllEvents', '/events', [], $this->logs);
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
                $charges[] = EventResponse::fromArray($charge['data']);
            } catch (\Exception $e) {
                Log::make()->error($e->getMessage(), $e->getTrace());

                continue;
            }
        }

        return $charges;
    }

    /**
     * Show an event
     *
     * @throws GuzzleException
     * @throws NotFoundException
     */
    public function retrieveEvent(string $event_id): EventResponse
    {
        $response = $this->api->get('CoinbaseCommerce@retrieveEvent:event_id', "/events/{$event_id}", [], $this->logs);
        if ($response->getStatusCode() === 404) {
            throw new NotFoundException;
        }
        $data = json_decode($response->getBody()->getContents(), true);
        if (! isset($data['data'])) {
            throw new NotFoundException;
        }

        return EventResponse::fromArray($data['data']);
    }
}
