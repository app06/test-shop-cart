<?php

namespace App\Services\Cart\Cost;

use App\Services\Cart\CartItem;

interface CalculatorInterface
{
    /**
     * @param CartItem[] $items
     * @return float
     */
    public function getCost($items);
} 
