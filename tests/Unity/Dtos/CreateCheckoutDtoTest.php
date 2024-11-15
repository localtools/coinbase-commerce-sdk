<?php

use LocalTools\CoinbaseCommerceSdk\Dtos\CreateCheckoutDto;
use LocalTools\CoinbaseCommerceSdk\Enums\RequestedInfoEnum;

describe('CreateCheckoutDto', function () {
    it('should create a new instance of CreateCheckoutDto', function () {
        $requestedInfo = new RequestedInfoEnum(RequestedInfoEnum::EMAIL);
        $dto = new CreateCheckoutDto(
            'en',
            ['100.00', 'USD'],
            ['key' => 'value'],
            'fixed_price',
            $requestedInfo
        );

        expect($dto)->toBeInstanceOf(CreateCheckoutDto::class)
            ->and($dto->buyer_locale)->toBe('en')
            ->and($dto->total_price)->toBe(['100.00', 'USD'])
            ->and($dto->metadata)->toBe(['key' => 'value'])
            ->and($dto->pricing_type)->toBe('fixed_price')
            ->and($dto->requested_info)->toBe($requestedInfo);
    });

    it('should create a new instance of CreateCheckoutDto from array', function () {
        $requestedInfo = new RequestedInfoEnum(RequestedInfoEnum::EMAIL);
        $data = [
            'buyer_locale' => 'en',
            'total_price' => ['100.00', 'USD'],
            'metadata' => ['key' => 'value'],
            'pricing_type' => 'fixed_price',
            'requested_info' => $requestedInfo,
        ];

        $dto = CreateCheckoutDto::fromArray($data);

        expect($dto)->toBeInstanceOf(CreateCheckoutDto::class)
            ->and($dto->buyer_locale)->toBe('en')
            ->and($dto->total_price)->toBe(['100.00', 'USD'])
            ->and($dto->metadata)->toBe(['key' => 'value'])
            ->and($dto->pricing_type)->toBe('fixed_price')
            ->and($dto->requested_info)->toBe($requestedInfo);
    });
});
