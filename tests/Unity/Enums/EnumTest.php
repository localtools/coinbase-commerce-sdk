<?php

use LocalTools\CoinbaseCommerceSdk\Enums\Enum;

describe('EnumTest', function () {
    it('should return an array of constants', function () {
        $constants = Enum::toArray();
        expect($constants)->toBeArray();
    });

    it('should validate a valid constant', function () {
        class EnumTestClass extends Enum
        {
            const VALID_VALUE = 'valid_value';
        }
        $isValid = EnumTestClass::isValid('valid_value');
        expect($isValid)->toBeTrue();
    });

    it('should invalidate an invalid constant', function () {
        $isValid = Enum::isValid('invalid_value');
        expect($isValid)->toBeFalse();
    });

    it('should assert a valid constant without throwing an exception', function () {
        EnumTestClass::assertValid('valid_value');
        expect(true)->toBeTrue(); // If no exception is thrown, the test passes
    });

    it('should throw an exception for an invalid constant', function () {
        expect(fn () => Enum::assertValid('invalid_value'))->toThrow(\InvalidArgumentException::class);
    });

    it('should assert a valid or null constant without throwing an exception', function () {
        $validValue = array_values(Enum::toArray())[0];
        Enum::assertValidOrNull($validValue);
        Enum::assertValidOrNull(null);
        expect(true)->toBeTrue(); // If no exception is thrown, the test passes
    });

    it('should assert a valid, empty, or null constant without throwing an exception', function () {
        $validValue = array_values(Enum::toArray())[0];
        Enum::assertValidOrEmptyOrNull($validValue);
        Enum::assertValidOrEmptyOrNull('');
        Enum::assertValidOrEmptyOrNull(null);
        expect(true)->toBeTrue(); // If no exception is thrown, the test passes
    });
});
