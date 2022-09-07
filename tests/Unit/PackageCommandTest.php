<?php

use Porifa\LaravelPackageKit\Package;
use Porifa\LaravelPackageKit\Tests\TestingPackage\Src\Console\Commands\PackageTestCommand;
use Porifa\LaravelPackageKit\Tests\TestingPackage\Src\TestingPackageServiceProvider;

beforeAll(
    function () {
        TestingPackageServiceProvider::$configurePackageUsing = function (Package $package) {
            $package
                ->name('example')
                ->hasCommands(PackageTestCommand::class);
        };
    }
);

it('can execute a registered command', function () {
    $this->artisan('test-command')->assertSuccessful();
});
