<?php

use Porifa\LaravelPackageKit\Package;
use Porifa\LaravelPackageKit\Tests\TestingPackage\Src\Console\Commands\PackageOtherTestCommand;
use Porifa\LaravelPackageKit\Tests\TestingPackage\Src\Console\Commands\PackageTestCommand;
use Porifa\LaravelPackageKit\Tests\TestingPackage\Src\TestingPackageServiceProvider;

beforeAll(
    function () {
        TestingPackageServiceProvider::$configurePackageUsing = function (Package $package) {
            $package
                ->name('laravel-testing-package')
                ->hasCommands([
                    PackageTestCommand::class,
                    PackageOtherTestCommand::class,
                ]);
        };
    }
);

it('can execute multiple registered commands', function () {
    $this->artisan('test-command')->assertSuccessful();

    $this->artisan('test-other-command')->assertSuccessful();
});
