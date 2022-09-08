<?php

use Porifa\LaravelPackageKit\Package;
use Porifa\LaravelPackageKit\Tests\TestingPackage\Src\TestingPackageServiceProvider;

beforeAll(
    function () {
        TestingPackageServiceProvider::$configurePackageUsing = function (Package $package) {
            $package
            ->name('laravel-testing-package')
            ->hasMigrations([
                'create_laravel_testing_package_table',
                'create_another_laravel_testing_package_table',
            ]);
        };
    }
);

// test('test with in directory');

it('can publish the migration', function () {
    $this
        ->artisan('vendor:publish --tag=testing-package-migrations')
        ->assertExitCode(0);

    $this->assertMigrationPublished('create_laravel_testing_package_table.php');
});


it('does not overwrite the existing migration', function () {
    $this
        ->artisan('vendor:publish --tag=testing-package-migrations')
        ->assertExitCode(0);

    $filePath = database_path('migrations/'.now()->format('Y_m_d_His').'_create_laravel_testing_package_table.php');
    database_path('migrations');
    $this->assertMigrationPublished('create_laravel_testing_package_table.php');

    file_put_contents($filePath, 'modified');

    $this
        ->artisan('vendor:publish --tag=testing-package-migrations')
        ->assertExitCode(0);

    $this->assertStringEqualsFile($filePath, 'modified');
});


it('does overwrite the existing migration with force', function () {
    $this
        ->artisan('vendor:publish --tag=testing-package-migrations')
        ->assertExitCode(0);

    $filePath = database_path('migrations/'.now()->format('Y_m_d_His').'_create_another_laravel_testing_package_table.php');

    $this->assertFileExists($filePath);

    file_put_contents($filePath, 'modified');

    $this
        ->artisan('vendor:publish --tag=testing-package-migrations  --force')
        ->assertExitCode(0);

    $this->assertStringEqualsFile(
        $filePath,
        file_get_contents(__DIR__.'/../TestingPackage/database/migrations/create_another_laravel_testing_package_table.php')
    );
});
