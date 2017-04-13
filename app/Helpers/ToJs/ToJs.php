<?php

namespace App\Helpers\ToJs;

use Illuminate\Support\Arr;

class ToJs
{
    protected $data = [];

    public function put(array $data)
    {
        foreach ($data as $key => $value) {
            $this->data[$key] = value($value);
        }

        return $this;
    }

    public function get($key = null, $default = null)
    {
        if (!$key) return $this->data;

        return Arr::get($this->data, $key, $default);
    }

    public function forget($keys)
    {
        Arr::forget($this->data, $keys);

        return $this;
    }
}