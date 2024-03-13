<?php

namespace App\Enum;

enum ToDoItemStatus: string
{
    case P = 'Pending';
    case C = 'Completed';

    public static function fromValue(string $name): string
    {
        foreach (self::cases() as $status) {
            if ($name === $status->name) {
                return $status->value;
            }
        }

        throw new \ValueError("Invalid name for ToDoItemStatus: {$name}");
    }

}