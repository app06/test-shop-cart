<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Services\Cart\CartService;
use Illuminate\Http\Response;

class CartController extends Controller
{
    /**
     * @var CartService
     */
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    private function modify(CartRequest $request, string $method)
    {
        try {
            $this->cartService->$method($request);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error'
            ], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(
            [
                'status' => 'success',
                'data' => [
                    'items' => $this->cartService->getItems(),
                    'totalItems' => $this->cartService->totalItems(),
                    'totalCost' => $this->cartService->getTotalCost(),
                ]
            ],
            Response::HTTP_ACCEPTED);
    }

    public function add(CartRequest $request)
    {
        return $this->modify($request, 'add');
    }

    public function remove(CartRequest $request)
    {
        return $this->modify($request, 'remove');
    }
}
