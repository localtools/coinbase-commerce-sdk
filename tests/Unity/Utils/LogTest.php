<?php

use LocalTools\CoinbaseCommerceSdk\Utils\Log;

describe('LogTest', function () {
    beforeEach(function () {
        $this->logTest = new Log;
    });

    it('should create a new instance of LogTest', function () {
        expect($this->logTest)->toBeInstanceOf(Log::class);
    });
});
