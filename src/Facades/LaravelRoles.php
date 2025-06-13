<?php

namespace NietThijmen\LaravelRoles\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \NietThijmen\LaravelRoles\LaravelRoles
 */
class LaravelRoles extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \NietThijmen\LaravelRoles\LaravelRoles::class;
    }
}
