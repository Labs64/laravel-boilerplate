<?php

namespace App\Helpers\Meta\Factories;

use App\Helpers\Meta\Traits\MetaFactory;
use App\Helpers\Meta\Entities\MetaProperty;

class MetaPropertyFactory
{
    use MetaFactory;

    public function __construct()
    {
        $this->entity =  MetaProperty::class;
    }
}