<?php

namespace App\Filters;

class _TypeFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('type', $value);
    }
}
