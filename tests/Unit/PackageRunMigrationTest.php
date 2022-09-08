<?php

use Porifa\LaravelPackageKit\Package;
use Porifa\LaravelPackageKit\Tests\TestingPackage\Src\TestingPackageServiceProvider;

beforeAll(
    function () {
        TestingPackageServiceProvider::$configurePackageUsing = function (Package $package) {
            $package
            ->name('laravel-testing-package')
            ->hasMigrations('create_laravel_testing_package_table')
            ->runsMigrations();
        };
    }
);


it('can run migrations which registers them', function () {
    /** @var \Illuminate\Database\Migrations\Migrator $migrator */
    $migrator = app('migrator');

    $this->assertCount(1, $migrator->paths());
    $this->assertStringContainsString('laravel_testing_package', $migrator->paths()[0]);
});
