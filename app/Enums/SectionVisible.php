<?php

declare (strict_types=1);

namespace App\Enums;

enum SectionVisible: string
{
    case VISIBLE = '1';
    case NO = '0';

    public static function all(): array
    {
        return [
            self::VISIBLE->value,
            self::NO->value,
        ];
    }
}