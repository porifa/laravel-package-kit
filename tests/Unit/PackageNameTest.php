<?php

use Porifa\LaravelPackageKit\Package;
use Porifa\LaravelPackageKit\Tests\TestingPackage\Src\TestingPackageServiceProvider;

beforeAll(
    function () {
        TestingPackageServiceProvider::$configurePackageUsing = function (Package $package) {
            $package->name('laravel-testing-package');
        };
    }
);

it('will pass when name is set', function () {
    $this->assertTrue(true);

    expect(true)->toBeTrue();
});
