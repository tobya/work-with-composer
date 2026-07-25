<?php

namespace Tobya\WorkWithComposer\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Tobya\WorkWithComposer\WorkWithComposer
 */
class WorkWithComposer extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Tobya\WorkWithComposer\WorkWithComposer::class;
    }
}
