<?php

namespace App\Filters;

use App\Filters\_AbstractFilter;

class GlobalFilter extends _AbstractFilter
{
    protected $filters = [
        'category' => _CategoryFilter::class,
        'status' => _StatusFilter::class,
        'code' => _CodeFilter::class,
        'type' => _TypeFilter::class,

        // relations
        'category_id' => _CategoryIdFilter::class,
        'tag' => _TagFilter::class,
    ];
}
