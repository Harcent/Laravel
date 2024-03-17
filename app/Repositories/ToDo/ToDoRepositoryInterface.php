<?php

namespace App\Repositories\ToDo;

use App\DTO\ToDo\CreateToDoDTO;
use App\DTO\ToDo\UpdateToDoDTO;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

interface ToDoRepositoryInterface
{
    public function getAll(string $filter = null): Collection;
    public function getById(string $id): stdClass|null;
    public function delete(string $id): void;
    public function create(CreateToDoDTO $dto): stdClass;
    public function update(UpdateToDoDTO $dto): stdClass|null;
}