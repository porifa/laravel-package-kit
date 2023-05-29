<?php

use Porifa\LaravelPackageKit\Package;
use Porifa\LaravelPackageKit\Tests\TestingPackage\Src\TestingPackageServiceProvider;
use Porifa\LaravelPackageKit\Tests\TestingPackage\Src\View\Components\FooComponent;

beforeAll(
    function () {
        TestingPackageServiceProvider::$configurePackageUsing = function (Package $package) {
            $package
                ->name('laravel-testing-package')
                ->hasViews()
                ->hasViewComponents('blabla', FooComponent::class);
        };
    }
);

it('can can load the views components', function () {
    $content = view('testing-package::foobar-component')->render();

    $this->assertStringStartsWith('<div>hello world</div>', $content);
});

it('can publish the view components', function () {
    $this
        ->artisan('vendor:publish --tag=testing-package-components')
        ->assertExitCode(0);

    $this->assertFileExists(app_path('View/Components/vendor/testing-package/FooComponent.php'));
});
