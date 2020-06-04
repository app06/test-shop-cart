<?php

namespace App\Services\Cart\Storage;

class SessionStorage implements StorageInterface
{
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function load()
    {
        return session()->has($this->key) ? unserialize(session($this->key)) : [];
    }

    public function save(array $items)
    {
        session()->put($this->key, serialize($items));
    }
}
