<?php

namespace App\Infrastructure\Repositories;

trait ManagesCache
{
    /**
     * Stores contents in cache.
     *
     * @param $key
     * @param $param
     * @param bool $serialize
     */
    public function store($key, $param, $serialize = true)
    {
        CacheRepository::getInstance()->store($key, $param, $serialize);
    }

    /**
     * Stores contents in cache.
     *
     * @param $key
     * @param $param
     * @param bool $serialize
     */
    public function remember($key, $param, $serialize = true)
    {
        CacheRepository::getInstance()->remember($key, $param, $serialize);
    }

    /**
     * Retrieves content from cache.
     *
     * @param $key
     * @param bool $unSerialize
     *
     * @return mixed
     */
    public function read($key, $unSerialize = true)
    {
        return CacheRepository::getInstance()->read($key, $unSerialize);
    }

    /**
     * Forgets a content from cache.
     *
     * @param $key
     *
     * @return bool
     */
    public function forget($key)
    {
        return CacheRepository::getInstance()->forget($key);
    }
}
