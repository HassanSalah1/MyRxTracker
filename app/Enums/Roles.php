<?php

namespace App\Enums;

enum Roles: string
{
    case ADMIN = 'admin';
    case MANAGER = 'manager';
    case USER = 'user';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}