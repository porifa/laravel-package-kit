<?php

namespace Porifa\LaravelPackageKit\Exceptions;

use Exception;

final class InvalidPackageException extends Exception
{
    public static function nameIsRequired(): self
    {
        return new self('This package does not have a name. You can set one with `$package->name("yourName")`');
    }
}
