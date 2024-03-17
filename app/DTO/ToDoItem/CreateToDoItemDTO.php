<?php

namespace App\DTO\ToDoItem;

use App\Enum\ToDoItemStatus;
use App\Http\Requests\StoreUpdateToDoItem;

class CreateToDoItemDTO
{
    public function __construct(
        public string $name,
        public string $description,
        public ToDoItemStatus $status,
        public string $to_do_id,
    ) {}

    public static function makeFromRequest(StoreUpdateToDoItem $request): self
    {
        return new self(
            $request->name,
            $request->description,
            ToDoItemStatus::P,
            $request->to_do_id, 
        );
    }
}