<?php

namespace App\Enums;

enum GlobalFlStatus: int
{
    case ACTIVE = 1;
    case NONACTIVE = 2;

    public function label(): string
    {
        return match ($this) {
            self::NONACTIVE => 'Nonactive',
            self::ACTIVE => 'Active',
        };
    }
}
