<?php

namespace App\Services\Cart;

use App\Services\Cart\Cost\CalculatorInterface;
use App\Services\Cart\Storage\StorageInterface;

class Cart
{
    private $items;

    private $storage;
    private $calculator;

    public function __construct(
        StorageInterface $storage,
        CalculatorInterface $calculator
    ) {
        $this->storage = $storage;
        $this->calculator = $calculator;
    }

    public function getItems()
    {
        $this->loadItems();
        return $this->items;
    }

    public function add($id, $count, $price)
    {
        $this->loadItems();
        $current = isset($this->items[$id]) ? $this->items[$id]->getCount() : 0;
        $this->items[$id] = new CartItem($id, $current + $count, $price);
        $this->saveItems();
    }

    public function remove($id)
    {
        $this->loadItems();
        if (array_key_exists($id, $this->items)) {
            unset($this->items[$id]);
        }
        $this->saveItems();
    }

    public function getCost()
    {
        $this->loadItems();
        return $this->calculator->getCost($this->items);
    }

    public function totalItems()
    {
        $total = 0;
        $this->loadItems();
        foreach ($this->items as $item) {
            /* @var $item CartItem */
            $total += $item->getCount();
        }
        return $total;
    }

    private function loadItems()
    {
        if ($this->items === null) {
            $this->items = $this->storage->load();
        }
    }

    private function saveItems()
    {
        $this->storage->save($this->items);
    }
} 
