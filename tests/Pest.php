<?php

use Porifa\LaravelPackageKit\Package;
use Porifa\LaravelPackageKit\Tests\TestCase;
use Porifa\LaravelPackageKit\Tests\TestingPackage\Src\TestingPackageServiceProvider;

uses(TestCase::class)
    ->beforeAll(function () {
        TestingPackageServiceProvider::$configurePackageUsing = function (Package $package) {
        };
    })
    ->in(__DIR__);
