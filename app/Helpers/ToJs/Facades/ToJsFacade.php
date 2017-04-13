<?php

namespace App\Helpers\ToJs\Facades;

use Illuminate\Support\Facades\Facade;


class ToJsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'tojs';
    }
}
