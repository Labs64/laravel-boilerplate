<?php
namespace App\Helpers\Meta\Entities;

use App\Helpers\Meta\Traits\MetaEntity;
use Illuminate\Support\HtmlString;
use Html;

class MetaProperty
{
    use MetaEntity;

    public function render()
    {
        if ($this->isEmpty()) return '';

        $attributes = array_merge(['property' => $this->name, 'content' => $this->content], $this->attributes);

        return new HtmlString('<meta' . Html::attributes($attributes) . '>' . PHP_EOL);
    }
}