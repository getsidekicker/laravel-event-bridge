# Laravel EventBridge

[![Latest Version on Packagist](https://img.shields.io/packagist/v/getsidekicker/laravel-event-bridge.svg?style=flat-square)](https://packagist.org/packages/getsidekicker/laravel-event-bridge)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/getsidekicker/laravel-event-bridge/run-tests?label=tests)](https://github.com/getsidekicker/laravel-event-bridge/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/getsidekicker/laravel-event-bridge/Check%20&%20fix%20styling?label=code%20style)](https://github.com/getsidekicker/laravel-event-bridge/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/getsidekicker/laravel-event-bridge.svg?style=flat-square)](https://packagist.org/packages/getsidekicker/laravel-event-bridge)

---

## Installation

You can install the package via composer:

```bash
composer require getsidekicker/laravel-event-bridge
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Sidekicker\EventBridge\EventBridgeServiceProvider" --tag="laravel-event-bridge-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Sidekicker\EventBridge\EventBridgeServiceProvider" --tag="laravel-event-bridge-config"
```

## Usage

```php
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Sidekicker](https://github.com/getsidekgetsidek)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
