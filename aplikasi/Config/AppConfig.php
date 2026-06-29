<?php

namespace Aplikasi\Config;

class AppConfig
{
    public const TOTAL_TABLES = 15;

    public static function storagePath(): string
    {
        return dirname(__DIR__, 2) . '/storage/reservations.json';
    }

    public static function tableCapacity(): array
    {
        return [
            1 => 2, 2 => 2, 3 => 2, 4 => 2, 5 => 2,
            6 => 4, 7 => 4, 8 => 4, 9 => 4, 10 => 4,
            11 => 6, 12 => 6, 13 => 6, 14 => 6, 15 => 6,
        ];
    }
}
