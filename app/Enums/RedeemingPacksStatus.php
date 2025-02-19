<?php

namespace App\Enums;

enum RedeemingPacksStatus: string
{
    case REQUEST = 'request';
    case READY = 'ready';
    case DELIVERED = 'delivered';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
