<?php

namespace MoonlyDays\Crowdin\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MoonlyDays\Crowdin\Crowdin
 */
class Crowdin extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \MoonlyDays\Crowdin\Crowdin::class;
    }
}
