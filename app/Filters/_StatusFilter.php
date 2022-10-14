<?php

namespace App\Filters;

class _StatusFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('status', $value);
    }
}
