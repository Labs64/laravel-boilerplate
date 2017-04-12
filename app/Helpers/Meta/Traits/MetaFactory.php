<?php
namespace App\Helpers\Meta\Traits;

use App\Helpers\Meta\Entities\MetaTag;
use Arcanedev\Support\Collection;
use Illuminate\Support\Arr;

trait MetaFactory
{
    protected $meta = [];

    protected $entity;

    public function set($name = null, $content = null, $attributes = [])
    {
        if ($name) $this->meta[$name] = new $this->entity($name, $content, $attributes);

        return $this;
    }

    public function get($name)
    {
        return Arr::get($this->meta, $name, new $this->entity());
    }

    public function forget($name = null)
    {
        if (is_null($name)) $this->meta = [];

        Arr::forget($this->meta, $name);

        return $this;
    }

    public function render($data = [])
    {
        $data = ($data instanceof Collection) ? $data : collect($data);

        $html = '';

        $meta = Arr::dot($this->meta);

        /** @var  $entity MetaEntity */
        foreach ($meta as $entity) {
            if (!$data->isEmpty()) {
                if (!$data->contains($entity->getName())) continue;
            }

            $html .= $entity->render();
        }

        return $html;
    }
}