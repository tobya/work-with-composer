# Tools to work-with-composer Package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tobya/work-with-composer.svg?style=flat-square)](https://packagist.org/packages/tobya/work-with-composer)
[![Total Downloads](https://img.shields.io/packagist/dt/tobya/work-with-composer.svg?style=flat-square)](https://packagist.org/packages/tobya/work-with-composer)

A set of simple tools to allow easy swapping in of local and production repositories.


## Installation

You can install the package via composer:

```bash
composer require tobya/work-with-composer
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="work-with-composer-config"
```


## Usage

Add a new local repository
```php

php artisan composer:addlocal

```

Restore a previously set up local repository
```php

php artisan composer:restore-local

```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Toby Allen](https://github.com/tobya)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/work-with-composer.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/work-with-composer)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).
