# Tools to work-with composer.json

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tobya/work-with-composer.svg?style=flat-square)](https://packagist.org/packages/tobya/work-with-composer)
[![Total Downloads](https://img.shields.io/packagist/dt/tobya/work-with-composer.svg?style=flat-square)](https://packagist.org/packages/tobya/work-with-composer)

A set of simple tools to allow easy swapping in of local and production repositories.  This is 
very useful when you are working on a package in conjunction with an app.  Previously 
created local links are stored so that future application can be simply selected.


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

php artisan composer:add-local

```

Restore a repository to the production version before publishing your app.
```php

php artisan composer:restore-production

```

Restore a previously set up local repository for development
```php

php artisan composer:restore-local

```

## Notes

The package stores the version of a package that was set when the local version is provided.
When restored this 'last_known_version' is restored.

## Testing

```bash
composer test
```


## Credits

- [Toby Allen](https://github.com/tobya)


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

