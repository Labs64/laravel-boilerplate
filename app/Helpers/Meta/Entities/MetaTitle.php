<?php

namespace App\Helpers\Meta\Entities;

use App\Helpers\Meta\Traits\MetaEntity;
use Illuminate\Support\HtmlString;
use Html;

class MetaTitle
{
    use MetaEntity;

    public function __construct($title = null, array $attributes = [])
    {
        $this->set($title, $attributes);
    }

    public function set($title, $attributes = [])
    {
        $this->name = 'title';
        $this->content = $title;
        $this->attributes = $attributes;

        return $this;
    }

    public function render()
    {
        if ($this->isEmpty()) return '';

        $title = (config('meta.title_suffix')) ? $this->content . ' ' . config('meta.title_suffix') : $this->content;

        return new HtmlString('<title' . Html::attributes($this->attributes) . '>' . $title . '</title>' . PHP_EOL);
    }
}