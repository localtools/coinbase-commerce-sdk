# Coinbase Commerce SDK

[![Latest Version on Packagist](https://img.shields.io/packagist/v/localtools/coinbase-commerce-sdk.svg?style=flat-square)](https://packagist.org/packages/localtools/coinbase-commerce-sdk)
[![Total Downloads](https://img.shields.io/packagist/dt/localtools/coinbase-commerce-sdk.svg?style=flat-square)](https://packagist.org/packages/localtools/coinbase-commerce-sdk)
[![License](https://img.shields.io/packagist/l/localtools/coinbase-commerce-sdk.svg?style=flat-square)](https://packagist.org/packages/localtools/coinbase-commerce-sdk)

Coinbase Commerce SDK is a PHP library for interacting with the Coinbase Commerce API.

## Installation

You can install the package via composer:

```bash
composer require localtools/coinbase-commerce-sdk
```

## Usage

### Initialization

```php
use LocalTools\CoinbaseCommerceSdk\CoinbaseCommerce;

$token = 'your-access-token';
$sdk = new CoinbaseCommerce($token);
```

### Checkouts

#### List Checkouts

```php
$checkouts = $sdk->checkouts->listCheckouts();
echo json_encode($checkouts, JSON_PRETTY_PRINT);
```

### Charges

#### Create Charge

```php
use LocalTools\CoinbaseCommerceSdk\Dtos\CreateChargeDto;
use LocalTools\CoinbaseCommerceSdk\Responses\Checkout\Extra\LocalPrice;

$createChargeDto = new CreateChargeDto(
    'The Human Fund',
    'Money For People',
    'fixed_price',
    new LocalPrice('1.00', 'USD'),
    'USD'
);
$charge = $sdk->charges->createCharge($createChargeDto);
echo $charge->id;
```

#### Retrieve Charge

```php
$charge = $sdk->charges->retrieveCharge('charge_id');
echo json_encode($charge, JSON_PRETTY_PRINT);
```

### Events

#### Retrieve All Events

```php
$events = $sdk->events->retrieveAllEvents();
echo json_encode($events, JSON_PRETTY_PRINT);
```

#### Retrieve Event

```php
$event = $sdk->events->retrieveEvent('event_id');
echo json_encode($event, JSON_PRETTY_PRINT);
```

## Testing

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security-related issues, please email [hebert@hotbrains.com.br](mailto:hebert@hotbrains.com.br) instead of using the issue tracker.

## Credits

- [Hebert Barros](https://github.com/hebertcisco)
- [All Contributors](https://github.com/localtools/coinbase-commerce-sdk/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.