<?php

namespace Porifa\LaravelPackageKit\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Porifa\LaravelPackageKit\Tests\TestingPackage\Src\TestingPackageServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            TestingPackageServiceProvider::class,
        ];
    }
}
