<?php

namespace App\Helpers\Meta\Traits;

use Illuminate\Support\Arr;

trait MetaEntity
{
    public $name = null;
    public $content = null;
    public $attributes = [];

    public function __construct($name = null, $content = null, $attributes = [])
    {
        $this->set($name, $content, $attributes);
    }

    public function set($name, $content = null, $attributes = [])
    {
        $this->name = $name;
        $this->content = $content;
        $this->attributes = $attributes;

        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    public function setAttribute($key, $value = null)
    {
        Arr::set($this->attributes, $key, $value);

        return $this;
    }

    public function getName($default = null)
    {
        return ($this->name) ? $this->name : $default;
    }

    public function getContent($default = null)
    {
        return ($this->content) ? $this->content : $default;
    }

    public function getAttribute($key, $default = null)
    {
        return Arr::get($this->attributes, $key, $default);
    }

    public function getAttributes($default = [])
    {
        return ($this->attributes) ? $this->attributes : $default;
    }

    public function isEmpty()
    {
        return (!$this->name || is_null($this->content));
    }

    abstract public function render();
}