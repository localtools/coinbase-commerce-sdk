<?php

use LocalTools\CoinbaseCommerceSdk\Responses\Checkout\Extra\MaxContributionAmount;

describe('MaxContributionAmount', function () {
    it('should return the correct amount and currency', function () {
        $maxContributionAmount = new MaxContributionAmount('100', 'USD');

        expect($maxContributionAmount->amount)->toBe('100')
            ->and($maxContributionAmount->currency)->toBe('USD');
    });
});
