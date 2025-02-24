<?php

namespace App\Enums;

enum NotificationStatus: string
{
    case HOME = 'home';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
