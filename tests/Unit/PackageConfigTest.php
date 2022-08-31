<?php

use Porifa\LaravelPackageKit\Package;
use Porifa\LaravelPackageKit\Tests\TestingPackage\Src\TestingPackageServiceProvider;

beforeAll(
    function () {
        TestingPackageServiceProvider::$configurePackageUsing = function (Package $package) {
            $package
            ->name('example')
            ->hasConfigFile('example');
        };
    }
);

it('can register the config file', function () {
    $this->assertEquals('value', config('example.key'));
});

it('can publish the config file', function () {
    $this
        ->artisan('vendor:publish --tag=example-config')
        ->assertExitCode(0);

    $this->assertFileExists(config_path('example.php'));
});
