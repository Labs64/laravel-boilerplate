<?php

namespace App\Helpers\Meta\Factories;

use App\Helpers\Meta\Entities\MetaProperty;
use App\Helpers\Meta\Traits\MetaFactory;

class MetaPropertyFactory
{
    use MetaFactory;

    public function __construct()
    {
        $this->entity = MetaProperty::class;
    }
}
