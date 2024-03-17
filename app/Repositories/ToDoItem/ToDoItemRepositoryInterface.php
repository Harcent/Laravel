<?php

namespace App\Repositories\ToDoItem;

use App\DTO\ToDoItem\CreateToDoItemDTO;
use App\DTO\ToDoItem\UpdateToDoItemDTO;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

interface ToDoItemRepositoryInterface
{
    public function getAll(string $to_do_id, string $filter = null): Collection;
    public function getById(string $to_do_id, string $id): stdClass|null;
    public function delete(string $to_do_id, string $id): void;
    public function create(CreateToDoItemDTO $dto): stdClass;
    public function update(UpdateToDoItemDTO $dto): stdClass|null;
}