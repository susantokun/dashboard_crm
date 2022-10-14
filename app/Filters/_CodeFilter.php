<?php

namespace App\Filters;

class _CodeFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('code', $value);
    }
}
