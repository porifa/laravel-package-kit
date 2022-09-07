<?php

namespace Porifa\LaravelPackageKit\Tests\TestingPackage\Src\Console\Commands;

use Illuminate\Console\Command;

class PackageOtherTestCommand extends Command
{
    public $name = 'test-other-command';

    public function handle()
    {
        $this->info('output from other test command');
    }
}
