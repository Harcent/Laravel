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

    public static function makeFromRequest(
        StoreUpdateToDoItem $request,
        ?string $oldName,
        ?string $oldDescription,
        ?string $oldStatus,
    ): self
    {
        
        $status = ToDoItemStatus::fromValue($request->status ?? $oldStatus);
        $description = $request->description !== null ? $request->description : $oldDescription;

        return new self(
            $request->item,
            $request->name ?? $oldName,
            $description,
            $status,
            $request->id,  
        );
    }
}