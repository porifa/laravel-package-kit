<?php

namespace Porifa\LaravelPackageKit\Exceptions;

use Exception;

class InvalidPackageException extends Exception
{
    public static function nameIsRequired(): self
    {
        return new static('This package does not have a name. You can set one with `$package->name("yourName")`');
    }
}
