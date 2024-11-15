<?php

namespace LocalTools\CoinbaseCommerceSdk\Exceptions;

use Exception;

class AccessTokenException extends Exception
{
    public function __construct()
    {
        parent::__construct('Access token is required', 401);
    }
}
