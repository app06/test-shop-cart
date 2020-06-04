<?php

namespace App\Http\ViewComposers;

use App\Services\Cart\CartService;
use Illuminate\View\View;

class HeaderCartComposer
{
    /**
     * @var CartService
     */
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function compose(View $view): void
    {
        $total = $this->cartService->totalItems() . 'шт. - $' . $this->cartService->getTotalCost();
        $view->with('headerCart', $total);
    }
}
