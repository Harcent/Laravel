<?php

namespace App\DTO\ToDoItem;

use App\Enum\ToDoItemStatus;
use App\Http\Requests\StoreUpdateToDoItem;

class UpdateToDoItemDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $description,
        public ToDoItemStatus $status,
        public string $to_do_id,
    ) {}

    public static function makeFromRequest(StoreUpdateToDoItem $request): self
    {
        
        $status = ToDoItemStatus::fromValue($request->status ?? 'P');

        return new self(
            $request->item,
            $request->name,
            $request->description ?? '',
            $status,
            $request->id,  
        );
    }
}