<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ProductsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(ProductsRequest $request)
    {
        $products = Product::activeFirst()->sort($request->withSortingField())->paginate(10);
        return view('products.index', compact('products'));
    }
}
