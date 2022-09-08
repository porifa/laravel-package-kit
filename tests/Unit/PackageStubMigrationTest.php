<?php

use Porifa\LaravelPackageKit\Package;
use Porifa\LaravelPackageKit\Tests\TestingPackage\Src\TestingPackageServiceProvider;

beforeAll(
    function () {
        TestingPackageServiceProvider::$configurePackageUsing = function (Package $package) {
            $package
            ->name('laravel-testing-package')
            ->hasMigrations([
                'create_stubed_laravel_testing_package_table'
            ]);
        };
    }
);


it('can publish the migration from stubbed', function () {
    $this
        ->artisan('vendor:publish --tag=testing-package-migrations')
        ->assertExitCode(0);

    $this->assertMigrationPublished('create_stubed_laravel_testing_package_table.php');
});
