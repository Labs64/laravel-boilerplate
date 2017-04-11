<?php
namespace App\Helpers\Javascript;

use Illuminate\Support\Arr;

class Javascript
{
    protected $data = [];

    public function put(array $data)
    {
        foreach ($data as $key => $value) {
            $this->data[$key] = $value;
        }

        return $this;
    }

    public function get($key, $default = null)
    {
        return Arr::get($this->data, $key, $default);
    }

    public function forget($keys)
    {
        Arr::forget($this->data, $keys);

        return $this;
    }

    public function html()
    {

        print'<script> window.Laravel = ' . json_encode($this->data) . '</script>';
    }
}