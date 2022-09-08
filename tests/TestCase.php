<?php

namespace Porifa\LaravelPackageKit\Tests;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Orchestra\Testbench\TestCase as Orchestra;
use Porifa\LaravelPackageKit\Tests\TestingPackage\Src\TestingPackageServiceProvider;
use Symfony\Component\Finder\SplFileInfo;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            TestingPackageServiceProvider::class,
        ];
    }

    public function assertMigrationPublished(string $fileName): self
    {
        $published = collect(File::allFiles(database_path('migrations')))
            ->contains(function (SplFileInfo $file) use ($fileName) {
                return Str::endsWith($file->getPathname(), $fileName);
            });

        $this->assertTrue($published);

        return $this;
    }
}
