<?php
/**
 * Created by PhpStorm.
 * User: b4rret
 * Date: 04.06.2020
 * Time: 2:15
 */

namespace App\Http\Requests;


class ProductsSortingDTO
{
    public $column;
    public $direction;

    public function __construct(string $column, string $direction)
    {
        $this->column = $column;
        $this->direction = $direction;
    }
}
