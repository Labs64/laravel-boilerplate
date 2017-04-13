<?php

namespace App\Http\Controllers\Traits;

use DaveJamesMiller\Breadcrumbs\Generator;

trait Breadcrumbs
{
    private $breadcrumbs;

    protected function breadcrumbs()
    {
        if ($this->breadcrumbs) return $this->breadcrumbs;

        return app(Generator::class);
    }
}