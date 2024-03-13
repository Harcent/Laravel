<?php

namespace App\Repositories;

use App\DTO\CreateToDoDTO;
use App\DTO\UpdateToDoDTO;
use App\Models\ToDo;
use App\Repositories\ToDoRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

class ToDoEloquentORM implements ToDoRepositoryInterface
{
    public function __construct(
        protected ToDo $model
    ) {}

    public function getAll(string $filter = null): Collection
    {
        return $this->model
             ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('name', $filter);
                }
             })
             ->get();
    }
    
    public function getById(string $id): stdClass|null
    {
        $to_do = $this->model->find($id);
        if (!$to_do) {
            return $to_do;
        }
        return (object) $to_do->toArray();
    }

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

    public function create(CreateToDoDTO $dto): stdClass
    {
        $to_do = $this->model->create(
            (array) $dto
        );

        return (object) $to_do->toArray();
    }

    public function update(UpdateToDoDTO $dto): stdClass|null
    {
        if (!$to_do = $this->model->find($dto->id)) {
            return null;
        }

        $to_do->update(
            (array) $dto
        );

        return (object) $to_do->toArray();
    }

}