<?php

use Porifa\LaravelPackageKit\Package;
use Porifa\LaravelPackageKit\Tests\TestingPackage\Src\TestingPackageServiceProvider;

beforeAll(
    function () {
        TestingPackageServiceProvider::$configurePackageUsing = function (Package $package) {
            $package->name('laravel-testing-package')
            ->hasConfigFiles(['testing-package', 'testing-package2']);
        };
    }
);

it('can register multiple config files', function () {
    expect(config('testing-package.key'))->toEqual('value');

    expect(config('testing-package2.other_key'))->toEqual('other_value');
});
