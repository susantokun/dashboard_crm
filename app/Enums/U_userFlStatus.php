<?php

namespace App\Enums;

enum U_userFlStatus: int
{
    case ACTIVE = 1;
    case NONACTIVE = 2;
    case SUSPEND = 3;
    case BANNED = 4;

    public function label(): string
    {
        return match ($this) {
            self::NONACTIVE => 'Nonactive',
            self::ACTIVE => 'Active',
            self::SUSPEND => 'Suspend',
            self::BANNED => 'Banned',
        };
    }
}
