<?php

namespace App\Services\Cart;

use App\Http\Requests\CartRequest;
use App\Models\Product;

class CartService
{
    /**
     * @var Cart
     */
    private $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function add(CartRequest $request)
    {
        $product = Product::active()->findOrFail($request->get('id'));
        $this->cart->add($product->id, 1, $product->price);
    }

    public function remove(CartRequest $request)
    {
        $product = Product::active()->findOrFail($request->get('id'));
        $this->cart->remove($product->id);
    }

    public function getItems()
    {
        $items = [];
        foreach ($this->cart->getItems() as $item) {
            $items[] = $this->serializeCartItem($item);
        }
        return $items;
    }

    public function getTotalCost()
    {
        return $this->cart->getCost();
    }

    public function totalItems()
    {
        return $this->cart->totalItems();
    }

    private function serializeCartItem(CartItem $item)
    {
        return [
            'id' => $item->getId(),
            'count' => $item->getCount(),
            'price' => $item->getPrice(),
            'cost' => $item->getCost(),
        ];
    }
}
