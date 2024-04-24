<?php

namespace App\Enums;

class TasksStatusEnums
{
    public const STATUS_CLOSED = 0;
    public const STATUS_DONE = 1;
    public const STATUS_TODO = 2;

    public static function getStatuses(): array
    {
        return [
            0 => self::STATUS_CLOSED,
            1 => self::STATUS_DONE,
            2 => self::STATUS_TODO,
        ];
    }
}
