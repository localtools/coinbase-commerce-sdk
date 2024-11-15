<?php

use LocalTools\CoinbaseCommerceSdk\Responses\Checkout\Extra\LocalPrice;

describe('LocalPriceTest', function () {
    beforeEach(function () {
        $this->localPriceTest = new LocalPrice(
            '100.00',
            'USD'
        );
    });

    it('should create a new instance of LocalPriceTest', function () {
        expect($this->localPriceTest)->toBeInstanceOf(LocalPrice::class);
    });

    it('should create a new instance of LocalPriceTest with amount and currency', function () {
        $localPrice = new LocalPrice('100.00', 'USD');
        expect($localPrice->amount)->toBe('100.00')
            ->and($localPrice->currency)->toBe('USD');
    });

    it('should create a new instance of LocalPriceTest from array', function () {
        $localPrice = LocalPrice::fromArray([
            'amount' => '100.00',
            'currency' => 'USD',
        ]);
        expect($localPrice->amount)->toBe('100.00')
            ->and($localPrice->currency)->toBe('USD');
    });

    it('should create a new instance of LocalPriceTest from array with missing amount', function () {
        $localPrice = LocalPrice::fromArray([
            'currency' => 'USD',
        ]);
        expect($localPrice->amount)->toBeNull()
            ->and($localPrice->currency)->toBe('USD');
    });

    it('should create a new instance of LocalPriceTest from array with missing currency', function () {
        $localPrice = LocalPrice::fromArray([
            'amount' => '100.00',
        ]);
        expect($localPrice->amount)->toBe('100.00')
            ->and($localPrice->currency)->toBeNull();
    });

    it('should create a new instance of LocalPriceTest from array with missing amount and currency', function () {
        $localPrice = LocalPrice::fromArray([]);
        expect($localPrice->amount)->toBeNull()
            ->and($localPrice->currency)->toBeNull();
    });
});
