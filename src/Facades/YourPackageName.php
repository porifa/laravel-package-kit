<?php

namespace VendorName\YourPackageName\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \VendorName\YourPackageName\YourPackageName
 */
class YourPackageName extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'YourPackageName';
    }
}
