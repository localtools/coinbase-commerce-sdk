<?php

use LocalTools\CoinbaseCommerceSdk\Requests\HttpClient;

describe('HttpClientTest', function () {
    beforeEach(function () {
        $this->httpClientTest = new HttpClient('GitHub', ['base_uri' => 'https://api.github.com']);
    });

    it('should create a new instance of HttpClientTest', function () {
        expect($this->httpClientTest)->toBeInstanceOf(HttpClient::class);
    });

    it('should get a response from the server', function () {
        $response = $this->httpClientTest->get('GitHub@getUserData', '/users/localtools');
        expect($response->getStatusCode())->toBe(200);
    });
});
