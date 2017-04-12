<?php

namespace App\Helpers\Meta\Facades;

use Illuminate\Support\Facades\Facade;


class MetaFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'meta';
    }
}
