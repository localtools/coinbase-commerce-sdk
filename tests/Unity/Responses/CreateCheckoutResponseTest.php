<?php

use LocalTools\CoinbaseCommerceSdk\Responses\Checkout\CreateCheckoutResponse;
use LocalTools\CoinbaseCommerceSdk\Responses\Checkout\Extra\LocalPrice;

it('should create a new instance of CreateCheckoutResponse', function () {
    $localPrice = new LocalPrice('100.00', 'USD');
    $response = new CreateCheckoutResponse(
        'FF5733',
        'https://example.com/logo.png',
        true,
        'Test Description',
        '12345',
        $localPrice,
        'Test Name',
        'Test Organization',
        'fixed_price',
        'email',
        'checkout'
    );

    expect($response)->toBeInstanceOf(CreateCheckoutResponse::class)
        ->and($response->brand_color)->toBe('FF5733')
        ->and($response->brand_logo_url)->toBe('https://example.com/logo.png')
        ->and($response->coinbase_managed_merchant)->toBeTrue()
        ->and($response->description)->toBe('Test Description')
        ->and($response->id)->toBe('12345')
        ->and($response->local_price)->toBe($localPrice)
        ->and($response->name)->toBe('Test Name')
        ->and($response->organization_name)->toBe('Test Organization')
        ->and($response->pricing_type)->toBe('fixed_price')
        ->and($response->requested_info)->toBe('email')
        ->and($response->resource)->toBe('checkout');
});

it('should create a new instance of CreateCheckoutResponse from array', function () {
    $data = [
        'brand_color' => 'FF5733',
        'brand_logo_url' => 'https://example.com/logo.png',
        'coinbase_managed_merchant' => true,
        'description' => 'Test Description',
        'id' => '12345',
        'local_price' => [
            'amount' => '100.00',
            'currency' => 'USD',
        ],
        'name' => 'Test Name',
        'organization_name' => 'Test Organization',
        'pricing_type' => 'fixed_price',
        'requested_info' => 'email',
        'resource' => 'checkout',
    ];

    $response = CreateCheckoutResponse::fromArray($data);

    expect($response)->toBeInstanceOf(CreateCheckoutResponse::class)
        ->and($response->brand_color)->toBe('FF5733')
        ->and($response->brand_logo_url)->toBe('https://example.com/logo.png')
        ->and($response->coinbase_managed_merchant)->toBeTrue()
        ->and($response->description)->toBe('Test Description')
        ->and($response->id)->toBe('12345')
        ->and($response->local_price->amount)->toBe('100.00')
        ->and($response->local_price->currency)->toBe('USD')
        ->and($response->name)->toBe('Test Name')
        ->and($response->organization_name)->toBe('Test Organization')
        ->and($response->pricing_type)->toBe('fixed_price')
        ->and($response->requested_info)->toBe('email')
        ->and($response->resource)->toBe('checkout');
});
