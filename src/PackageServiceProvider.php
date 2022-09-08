<?php

namespace Porifa\LaravelPackageKit;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Porifa\LaravelPackageKit\Exceptions\InvalidPackageException;
use ReflectionClass;

abstract class PackageServiceProvider extends ServiceProvider
{
    protected Package $package;

    abstract public function configurePackage(Package $package): void;

    public function register(): self
    {
        $this->packageRegistering();

        $this->package = $this->newPackage();

        $this->package->setBasePath($this->getPackageBaseDir());

        $this->configurePackage($this->package);

        throw_if(empty($this->package->name), InvalidPackageException::nameIsRequired());

        foreach ($this->package->configFileNames as $configFileName) {
            $this->mergeConfigFrom($this->package->basePath("/../config/{$configFileName}.php"), $configFileName);
        }

        $this->packageRegistered();

        return $this;
    }

    public function boot(): self
    {
        $this->packageBooting();

        if ($this->app->runningInConsole()) {
            foreach ($this->package->configFileNames as $configFileName) {
                $this->publishes([
                    $this->package->basePath("/../config/{$configFileName}.php") => config_path("{$configFileName}.php"),
                ], "{$this->package->shortName()}-config");
            }

            if (! empty($this->package->commands)) {
                $this->commands($this->package->commands);
            }

            foreach ($this->package->migrationFileNames as $migrationFileName) {
                $filePath = $this->package->basePath("/../database/migrations/{$migrationFileName}.php");
                if (! file_exists($filePath)) {
                    // Support for the .stub file extension
                    $filePath .= '.stub';
                }

                $this->publishes([
                    $filePath => $this->generateMigrationName($migrationFileName),
                ], "{$this->package->shortName()}-migrations");

            }
        }

        $this->packageBooted();

        return $this;
    }

    public function packageRegistering()
    {
        //
    }

    public function packageRegistered()
    {
        //
    }

    public function packageBooting()
    {
        //
    }

    public function packageBooted()
    {
        //
    }

    public function newPackage(): Package
    {
        return new Package();
    }

    public static function generateMigrationName(string $migrationFileName): string
    {
        $migrationsPath = 'migrations/';

        $len = strlen($migrationFileName) + 4;

        if (Str::contains($migrationFileName, '/')) {
            $migrationsPath .= Str::of($migrationFileName)->beforeLast('/')->finish('/');
            $migrationFileName = Str::of($migrationFileName)->afterLast('/');
        }

        foreach (glob(database_path("{$migrationsPath}*.php")) as $filename) {
            if ((substr($filename, -$len) === $migrationFileName . '.php')) {
                return $filename;
            }
        }

        return database_path($migrationsPath . now()->format('Y_m_d_His') . '_' . Str::of($migrationFileName)->snake()->finish('.php'));
    }

    protected function getPackageBaseDir(): string
    {
        $reflector = new ReflectionClass(get_class($this));

        return dirname($reflector->getFileName());
    }
}
