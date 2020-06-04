<?php

namespace App\Services\Cart\Storage;

use App\Services\Cart\CartItem;

interface StorageInterface
{
    /**
     * @return CartItem[]
     */
    public function load();

    /**
     * @param CartItem[] $items
     */
    public function save(array $items);
}
