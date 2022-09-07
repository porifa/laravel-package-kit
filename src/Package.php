<?php

namespace Porifa\LaravelPackageKit;

use Illuminate\Support\Str;

class Package
{
    public string $name;

    public array $configFileNames = [];

    public array $commands = [];

    public string $basePath;

    public function name(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function hasConfigFiles(string|array $configFileName = null): self
    {
        $configFileName = $configFileName ?? $this->shortName();

        if (! is_array($configFileName)) {
            $configFileName = [$configFileName];
        }

        $this->configFileNames = $configFileName;

        return $this;
    }

    public function hasCommands(string|array $commandClassNames): self
    {
        if (! is_array($commandClassNames)) {
            $commandClassNames = [$commandClassNames];
        }

        $this->commands = $commandClassNames;

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

    public function setBasePath(string $path): self
    {
        $this->basePath = $path;

        return $this;
    }
}
