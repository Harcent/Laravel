<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateToDo;

class UpdateToDoDTO
{
    public function __construct(
        public string $id,
        public string $name,
    ) {}

    public static function makeFromRequest(StoreUpdateToDo $request): self
    {
        return new self(
            $request->id,
            $request->name,
        );
    }
}