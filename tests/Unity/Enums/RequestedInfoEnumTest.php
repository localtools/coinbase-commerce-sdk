<?php

use LocalTools\CoinbaseCommerceSdk\Enums\RequestedInfoEnum;

describe('RequestedInfoEnum', function () {
    it('should return the correct values', function () {
        expect(RequestedInfoEnum::NAME)->toBe('name')
            ->and(RequestedInfoEnum::EMAIL)->toBe('email')
            ->and(RequestedInfoEnum::ADDRESS)->toBe('address')
            ->and(RequestedInfoEnum::PHONE)->toBe('phone')
            ->and(RequestedInfoEnum::EMPLOYER)->toBe('employer')
            ->and(RequestedInfoEnum::OCCUPATION)->toBe('occupation');
    });
});
