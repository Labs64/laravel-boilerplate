<?php

namespace App\Helpers\Meta;

use App\Helpers\Meta\Entities\MetaTitle;

use App\Helpers\Meta\Factories\MetaPropertyFactory;
use App\Helpers\Meta\Factories\MetaTagFactory;

class Meta
{
    protected $title;
    protected $tagFactory;
    protected $propertyFactory;

    public function __construct()
    {
        $this->title = new MetaTitle();
        $this->tagFactory = new MetaTagFactory();
        $this->propertyFactory = new MetaPropertyFactory();
    }

    public function title($title = null, $attributes = [])
    {
        if ($title) $this->title->set($title, $attributes);

        return $this->title;
    }

    public function tag($name = null, $content = null, $attributes = [])
    {
        return $this->tagFactory->set($name, $content, $attributes);
    }

    public function property($name = null, $content = null, $attributes = [])
    {
        return $this->propertyFactory->set($name, $content, $attributes);
    }

    public function render($keys = [])
    {
        $keys = is_string($keys) ? explode(',', str_replace(['(', ')', '[', ']'], '', $keys)) : $keys;

        $keys = collect($keys);

        $html = ($keys->isEmpty() || (!$keys->isEmpty() && $keys->contains('title'))) ? $this->title->render() : '';
        $html .= $this->tagFactory->render($keys);
        $html .= $this->propertyFactory->render($keys);

        return $html;
    }
}