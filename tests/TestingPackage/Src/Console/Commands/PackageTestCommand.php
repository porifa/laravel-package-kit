<?php

namespace Porifa\LaravelPackageKit\Tests\TestingPackage\Src\Console\Commands;

use Illuminate\Console\Command;

class PackageTestCommand extends Command
{
    public $name = 'test-command';

    public function handle()
    {
        $this->info('output from test command');
    }
}
