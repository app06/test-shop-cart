<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductsRequest extends FormRequest
{
    private const SORTING_COLUMN = 'sortingColumn';
    private const SORTING_DIRECTION = 'sortingDirection';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules(): array
    {
        return [
            'sorting' => Rule::in(['title', '-title', 'price', '-price'])
        ];
    }

    public function withSortingField()
    {
        $sortColumn = $this->request->get('sorting');

        if ($sortColumn) {
            $direction = Str::startsWith($sortColumn, '-') ? 'desc' : 'asc';
            $column = ltrim($sortColumn, '-');

            $this->request->add([
                self::SORTING_COLUMN => $column,
                self::SORTING_DIRECTION => $direction
            ]);
        }

        return $this;
    }

    public function getSortingDirection(): ?string
    {
        return $this->request->get(self::SORTING_DIRECTION) ?? null;
    }

    public function getSortingColumn(): ?string
    {
        return $this->request->get(self::SORTING_COLUMN) ?? null;
    }
}
