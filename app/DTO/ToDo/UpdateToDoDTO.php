<?php

namespace App\DTO\ToDo;

use App\Http\Requests\StoreUpdateToDo;

class UpdateToDoDTO
{
    public function __construct(
        public string $id,
        public string $name,
    ) {}

    public static function makeFromRequest(StoreUpdateToDo $request, string $id = null): self
    {
        return new self(
            $id ?? $request->id,
            $request->name,
        );
    }
}