<?php

use Illuminate\Support\Facades\File;
use Porifa\LaravelPackageKit\Package;
use Porifa\LaravelPackageKit\Tests\TestCase;
use Porifa\LaravelPackageKit\Tests\TestingPackage\Src\TestingPackageServiceProvider;
use Symfony\Component\Finder\SplFileInfo;

uses(TestCase::class)
    ->beforeAll(function () {
        TestingPackageServiceProvider::$configurePackageUsing = function (Package $package) {
        };
    })
    ->in(__DIR__);

uses()->afterEach(function () {
    $configPath = config_path('testing-package.php');

    if (file_exists($configPath)) {
        unlink($configPath);
    }

    collect(File::allFiles(database_path('migrations')))
        ->each(function (SplFileInfo $file) {
            unlink($file->getPathname());
        });

    if (file_exists(resource_path('views/vendor'))) {
        collect(File::allFiles(resource_path('views/vendor')))
            ->each(function (SplFileInfo $file) {
                unlink($file->getPathname());
            });
    }

    if (file_exists(app_path('View/Components'))) {
        collect(File::allFiles(app_path('View/Components')))
            ->each(function (SplFileInfo $file) {
                unlink($file->getPathname());
            });
    }
})->in(__DIR__);
