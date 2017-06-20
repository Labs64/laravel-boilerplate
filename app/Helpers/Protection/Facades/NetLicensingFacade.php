<?php

namespace App\Helpers\Protection\Facades;

use Illuminate\Support\Facades\Facade;


class NetLicensingFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'netlicensing';
    }
}
