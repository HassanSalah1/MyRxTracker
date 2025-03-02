<?php

namespace App\Enums;

enum ApplicationMode: string
{
    case STARTER_PACK = 'starter';
    case ONTRACK_PACK = 'ontrack';
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
