<?php

namespace App\Services;

use App\DTO\CreateToDoDTO;
use App\DTO\UpdateToDoDTO;
use App\Repositories\ToDoRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

class ToDoService
{
    public function __construct(
        protected ToDoRepositoryInterface $repository
    ) {}

    public function getAll(string $filter = null): Collection
    {
        return $this->repository->getAll($filter);
    }

    public function getById(string $id): stdClass|null
    {
        return $this->repository->getById($id);
    }

    public function create(CreateToDoDTO $dto): stdClass
    {
        return $this->repository->create($dto);
    }

    public function update(UpdateToDoDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
} 