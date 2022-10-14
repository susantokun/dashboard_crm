<?php

namespace App\Filters;

class _CategoryIdFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereHas('category', fn ($query) => $query->where('id', $value));
    }
}
