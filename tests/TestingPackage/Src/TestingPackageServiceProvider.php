<?php

namespace Porifa\LaravelPackageKit\Tests\TestingPackage\Src;

use Closure;
use Porifa\LaravelPackageKit\Package;
use Porifa\LaravelPackageKit\PackageServiceProvider;

class TestingPackageServiceProvider extends PackageServiceProvider
{
    public static ?Closure $configurePackageUsing = null;

    public function configurePackage(Package $package): void
    {
        $configClosure = self::$configurePackageUsing ?? function (Package $package) {
        };
        ($configClosure)($package);
    }
}
