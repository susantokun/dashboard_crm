<?php

namespace App\Filters;

class _CategoryFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('category', $value);
    }
}
