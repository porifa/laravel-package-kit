<?php

use Porifa\LaravelPackageKit\Package;
use Porifa\LaravelPackageKit\Tests\TestingPackage\Src\TestingPackageServiceProvider;

beforeAll(
    function () {
        TestingPackageServiceProvider::$configurePackageUsing = function (Package $package) {
            $package->name('example')
            ->hasConfigFiles(['example', 'example2']);
        };
    }
);

it('can register multiple config files', function () {
    expect(config('example.key'))->toEqual('value');

    expect(config('example2.other_key'))->toEqual('other_value');
});
