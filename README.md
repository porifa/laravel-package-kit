# Toolkit for creating Laravel packages

[![Latest Version](https://img.shields.io/packagist/v/porifa/laravel-package-kit.svg?style=flat-square)](https://packagist.org/packages/porifa/laravel-package-kit)
[![GitHub Tests Action Status](<https://img.shields.io/github/workflow/status/porifa/laravel-package-kit/pest?label=Tests%20(Pest)>)](https://github.com/porifa/laravel-package-kit/actions?query=workflow%3Apest+branch%3Amain)
[![GitHub Code Style Action Status](<https://img.shields.io/github/workflow/status/porifa/laravel-package-kit/Pint?label=Code%20Style%20(Pint)>)](https://github.com/porifa/laravel-package-kit/actions?query=workflow%3Apint+branch%3Amain)
[![Quality Score](https://img.shields.io/scrutinizer/g/porifa/laravel-package-kit.svg?style=flat-square)](https://scrutinizer-ci.com/g/porifa/laravel-package-kit)
[![Downloads](https://img.shields.io/packagist/dt/porifa/laravel-package-kit.svg?style=flat-square)](https://packagist.org/packages/porifa/laravel-package-kit)
[![License](https://img.shields.io/packagist/l/porifa/laravel-package-kit.svg?style=flat-square)](https://packagist.org/packages/porifa/laravel-package-kit)

This package contains a `PackageServiceProvider` that you can use in your packages to easily register config files, and more.

## Usage

```php
use Porifa\LaravelPackageKit\PackageServiceProvider;
use Porifa\LaravelPackageKit\Package;

class YourPackageServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('your-package-name')
            ->hasConfigFile()
    }
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/porifa/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Aamir Sohail KmAs](https://github.com/AamirSohailKmAs)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
