<?php

use Porifa\LaravelPackageKit\Package;
use Porifa\LaravelPackageKit\Tests\TestingPackage\Src\TestingPackageServiceProvider;

beforeAll(
    function () {
        TestingPackageServiceProvider::$configurePackageUsing = function (Package $package) {
            $package
            ->name('laravel-testing-package')
            ->hasViews();
        };
    }
);

it('can can load the views', function () {
    $content = view('testing-package::foo')->render();

    $this->assertStringStartsWith('This is a foo blade view', $content);
});

it('can publish the views', function () {
    $this
        ->artisan('vendor:publish --tag=testing-package-views')
        ->assertExitCode(0);

    $this->assertFileExists(resource_path('views/vendor/testing-package/foo.blade.php'));
});
