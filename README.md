<!--delete-->
# How to use and replace placeholders

Use this template and Clone it locally

Open terminal in workspace root directory

```bash
php setup
```

This setup will guide you through creating your package files.


<!--/delete-->
# :package_description

[![Stable Version](https://img.shields.io/packagist/v/:vendor_slug/:package_slug.svg?style=flat-square)](https://packagist.org/packages/:vendor_slug/:package_slug)
[![GitHub Tests Action Status](<https://img.shields.io/github/workflow/status/:vendor_slug/:package_slug/tests?label=Tests%20(Pest)>)](https://github.com/:vendor_slug/:package_slug/actions?query=workflow%3Atests+branch%3Amain)
[![GitHub Code Style Action Status](<https://img.shields.io/github/workflow/status/:vendor_slug/:package_slug/Pint?label=Code%20Style%20(Pint)>)](https://github.com/:vendor_slug/:package_slug/actions?query=workflow%3A"pest"+branch%3Amain)
[![Quality Score](https://img.shields.io/scrutinizer/g/:vendor_slug/:package_slug.svg?style=flat-square)](https://scrutinizer-ci.com/g/:vendor_slug/:package_slug)
[![Downloads](https://img.shields.io/packagist/dt/:vendor_slug/:package_slug.svg?style=flat-square)](https://packagist.org/packages/:vendor_slug/:package_slug)
[![License](https://img.shields.io/packagist/l/:vendor_slug/:package_slug.svg?style=flat-square)](https://packagist.org/packages/:vendor_slug/:package_slug)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require :vendor_slug/:package_slug
```

You can publish the migrations with:

```bash
php artisan vendor:publish --tag=":package_slug-migrations"
```

Now run the migrations with:

```bash
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag=":package_slug-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag=":package_slug-views"
```

## Usage

```php
$variable = new VendorName\YourPackageName();
echo $variable->echoPhrase('Hello, VendorName!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/:author_username/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [:author_name](https://github.com/:author_username)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
