<?php

namespace App\Enums;

enum ProgramStatus: string
{
    case ELIGIBLE = 'eligible';
    case PENDING_APPROVAL = 'pending_approval';
    case APPROVED = 'approved';
    case COMPLETED = 'completed';
    case REJECTED = 'rejected';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}

