<?php

namespace VendorName\YourPackageName\Console\Commands;

use Illuminate\Console\Command;

class YourPackageNameCommand extends Command
{
    public $signature = 'YourPackageName';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
