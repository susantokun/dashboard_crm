<?php

namespace App\Filters;

class _TagFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereHas('tags', fn ($query) => $query->where('id', $value));
    }
}
