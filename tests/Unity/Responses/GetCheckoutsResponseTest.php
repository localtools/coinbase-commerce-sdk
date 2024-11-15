<?php

use LocalTools\CoinbaseCommerceSdk\Responses\Checkout\Extra\LocalPrice;
use LocalTools\CoinbaseCommerceSdk\Responses\Checkout\Extra\MaxContributionAmount;
use LocalTools\CoinbaseCommerceSdk\Responses\Checkout\GetCheckoutsResponse;

it('should create a new instance of GetCheckoutsResponse', function () {
    $localPrice = new LocalPrice('100.00', 'USD');
    $maxContributionAmount = new MaxContributionAmount('500.00', 'USD');
    $response = new GetCheckoutsResponse(
        'FF5733',
        'https://example.com/logo.png',
        true,
        'Test Description',
        'Extended Test Description',
        '12345',
        $localPrice,
        'https://example.com/logo.png',
        $maxContributionAmount,
        'Test Name',
        'Test Organization',
        'fixed_price',
        ['email'],
        'checkout',
        ['10.00', '20.00']
    );

    expect($response)->toBeInstanceOf(GetCheckoutsResponse::class)
        ->and($response->brand_color)->toBe('FF5733')
        ->and($response->brand_logo_url)->toBe('https://example.com/logo.png')
        ->and($response->coinbase_managed_merchant)->toBeTrue()
        ->and($response->description)->toBe('Test Description')
        ->and($response->extended_description)->toBe('Extended Test Description')
        ->and($response->id)->toBe('12345')
        ->and($response->local_price)->toBe($localPrice)
        ->and($response->logo_url)->toBe('https://example.com/logo.png')
        ->and($response->max_contribution_amount)->toBe($maxContributionAmount)
        ->and($response->name)->toBe('Test Name')
        ->and($response->organization_name)->toBe('Test Organization')
        ->and($response->pricing_type)->toBe('fixed_price')
        ->and($response->requested_info)->toBe(['email'])
        ->and($response->resource)->toBe('checkout')
        ->and($response->suggested_amounts)->toBe(['10.00', '20.00']);
});

it('should create a new instance of GetCheckoutsResponse from array', function () {
    $data = [
        'brand_color' => 'FF5733',
        'brand_logo_url' => 'https://example.com/logo.png',
        'coinbase_managed_merchant' => true,
        'description' => 'Test Description',
        'extended_description' => 'Extended Test Description',
        'id' => '12345',
        'local_price' => new LocalPrice('100.00', 'USD'),
        'logo_url' => 'https://example.com/logo.png',
        'max_contribution_amount' => new MaxContributionAmount('500.00', 'USD'),
        'name' => 'Test Name',
        'organization_name' => 'Test Organization',
        'pricing_type' => 'fixed_price',
        'requested_info' => ['email'],
        'resource' => 'checkout',
        'suggested_amounts' => ['10.00', '20.00'],
    ];

    $response = GetCheckoutsResponse::fromArray($data);

    expect($response)->toBeInstanceOf(GetCheckoutsResponse::class)
        ->and($response->brand_color)->toBe('FF5733')
        ->and($response->brand_logo_url)->toBe('https://example.com/logo.png')
        ->and($response->coinbase_managed_merchant)->toBeTrue()
        ->and($response->description)->toBe('Test Description')
        ->and($response->extended_description)->toBe('Extended Test Description')
        ->and($response->id)->toBe('12345')
        ->and($response->local_price->amount)->toBe('100.00')
        ->and($response->local_price->currency)->toBe('USD')
        ->and($response->logo_url)->toBe('https://example.com/logo.png')
        ->and($response->max_contribution_amount->amount)->toBe('500.00')
        ->and($response->max_contribution_amount->currency)->toBe('USD')
        ->and($response->name)->toBe('Test Name')
        ->and($response->organization_name)->toBe('Test Organization')
        ->and($response->pricing_type)->toBe('fixed_price')
        ->and($response->requested_info)->toBe(['email'])
        ->and($response->resource)->toBe('checkout')
        ->and($response->suggested_amounts)->toBe(['10.00', '20.00']);
});
