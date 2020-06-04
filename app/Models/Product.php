<?php

namespace App\Models;

use App\Http\Requests\ProductsRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public const IN_STOCK_ENABLED = 1;
    public const IN_STOCK_DISABLED = 0;

    public function scopeActive(Builder $query)
    {
        return $query->where('in_stock', self::IN_STOCK_ENABLED);
    }

    public function scopeActiveFirst(Builder $query)
    {
        return $query->orderByDesc('in_stock');
    }

    public function scopeSort(Builder $query, ProductsRequest $request)
    {
        $column = $request->getSortingColumn();
        $direction = $request->getSortingDirection();

        if ($column && $direction) {
            return $query->orderBy($column, $direction);
        }

        return $query;
    }
}
