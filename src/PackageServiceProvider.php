<?php

namespace Porifa\LaravelPackageKit;

use Illuminate\Support\ServiceProvider;
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

    protected function getPackageBaseDir(): string
    {
        $reflector = new ReflectionClass(get_class($this));

        return dirname($reflector->getFileName());
    }
}
