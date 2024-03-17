<?php

namespace App\Services;

use App\DTO\ToDoItem\CreateToDoItemDTO;
use App\DTO\ToDoItem\UpdateToDoItemDTO;
use App\Repositories\ToDoItem\ToDoItemRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

class ToDoItemService
{
    public function __construct(
        protected ToDoItemRepositoryInterface $repository
    ) {}

    public function getAll(string $to_do_id, string $filter = null): Collection
    {
        return $this->repository->getAll($to_do_id, $filter);
    }

    public function getById(string $to_do_id, string $id): stdClass|null
    {
        return $this->repository->getById($to_do_id, $id);
    }

    public function create(CreateToDoItemDTO $dto): stdClass
    {
        return $this->repository->create($dto);
    }

    public function update(UpdateToDoItemDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    public function delete(string $to_do_id, string $id): void
    {
        $this->repository->delete($to_do_id, $id);
    }
} 