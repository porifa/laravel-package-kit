<?php

use Porifa\LaravelPackageKit\Package;
use Porifa\LaravelPackageKit\Tests\TestingPackage\Src\TestingPackageServiceProvider;

beforeAll(
    function () {
        TestingPackageServiceProvider::$configurePackageUsing = function (Package $package) {
            $package
            ->name('laravel-testing-package')
            ->hasConfigFiles('testing-package');
        };
    }
);

it('can register the config file', function () {
    $this->assertEquals('value', config('testing-package.key'));
});

it('can publish the config file', function () {
    $this
        ->artisan('vendor:publish --tag=testing-package-config')
        ->assertExitCode(0);

    $this->assertFileExists(config_path('testing-package.php'));
});
