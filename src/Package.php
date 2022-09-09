<?php

namespace Porifa\LaravelPackageKit;

use Illuminate\Support\Str;

class Package
{
    public string $name;

    public array $configFileNames = [];

    public array $commands = [];

    public array $migrationFileNames = [];

    public bool $runsMigrations = false;

    public bool $hasViews = false;

    public ?string $viewNamespace = null;

    public string $basePath;

    public function name(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function hasConfigFiles(array|string $configFileName = null): self
    {
        $configFileName = $configFileName ?? $this->shortName();

        if (! is_array($configFileName)) {
            $configFileName = [$configFileName];
        }

        $this->configFileNames = $configFileName;

        return $this;
    }

    public function hasCommands(array|string $commandClassNames): self
    {
        if (! is_array($commandClassNames)) {
            $commandClassNames = [$commandClassNames];
        }

        $this->commands = $commandClassNames;

        return $this;
    }

    public function hasMigrations(array|string $migrationFileNames): self
    {
        if (! is_array($migrationFileNames)) {
            $migrationFileNames = [$migrationFileNames];
        }

        $this->migrationFileNames = $migrationFileNames;

        return $this;
    }

    public function runsMigrations(bool $runsMigrations = true): self
    {
        $this->runsMigrations = $runsMigrations;

        return $this;
    }

    public function hasViews(string $namespace = null): self
    {
        $this->hasViews = true;

        $this->viewNamespace = $namespace;

        return $this;
    }

    public function shortName(): string
    {
        return Str::after($this->name, 'laravel-');
    }

    public function basePath(string $directory = null): string
    {
        if ($directory === null) {
            return $this->basePath;
        }

        return $this->basePath . DIRECTORY_SEPARATOR . ltrim($directory, DIRECTORY_SEPARATOR);
    }

    public function viewNamespace(): string
    {
        return $this->viewNamespace ?? $this->shortName();
    }

    public function setBasePath(string $path): self
    {
        $this->basePath = $path;

        return $this;
    }
}
