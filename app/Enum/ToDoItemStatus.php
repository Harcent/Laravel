<?php

namespace App\Enum;

enum ToDoItemStatus: string
{
    case P = 'Pending';
    case C = 'Completed';

    public static function fromValue(string $name): ToDoItemStatus
    {
        foreach (self::cases() as $status) {
            if ($name === $status->name) {
                return $status;
            }
        }

        throw new \ValueError("Invalid name for ToDoItemStatus: {$name}");
    }

}