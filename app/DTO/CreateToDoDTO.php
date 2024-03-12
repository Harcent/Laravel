<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateToDo;

class CreateToDoDTO
{
    public function __construct(
        public string $name,
    ) {}

    public static function makeFromRequest(StoreUpdateToDo $request): self
    {
        return new self(
            $request->name,
        );
    }
}