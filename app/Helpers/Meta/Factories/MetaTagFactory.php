<?php
namespace App\Helpers\Meta\Factories;

use App\Helpers\Meta\Traits\MetaFactory;
use App\Helpers\Meta\Entities\MetaTag;

class MetaTagFactory
{
    use MetaFactory;

    public function __construct()
    {
        $this->entity =  MetaTag::class;
    }
}