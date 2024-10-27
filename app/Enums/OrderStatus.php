<?php

declare (strict_types=1);

namespace App\Enums;

enum OrderStatus: string
{
    case DRAFT = 'draft';
    case ACTIVE = 'active';
    case CLOSED = 'closed';
    case BLOCKED = 'blocked';

    public static function all(): array
    {
        return [
            self::DRAFT->value,
            self::ACTIVE->value,
            self::CLOSED->value,
            self::BLOCKED->value,
        ];
    }
}