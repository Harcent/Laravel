<?php

namespace App\Repositories\ToDoItem;

use App\DTO\ToDoItem\CreateToDoItemDTO;
use App\DTO\ToDoItem\UpdateToDoItemDTO;
use App\Models\ToDoItem;
use App\Repositories\ToDoItem\ToDoItemRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

class ToDoItemEloquentORM implements ToDoItemRepositoryInterface
{
    public function __construct(
        protected ToDoItem $model
    ) {}

    public function getAll(string $to_do_id, string $filter = null): Collection
    {
        return $this->model
                ->where('to_do_id', $to_do_id)
                ->where(function ($query) use ($filter) {
                    if ($filter) {
                        $query->where('name', $filter);
                    }
                })
                ->get();
    }
    
    public function getById(string $to_do_id, string $id): stdClass|null
    {
        $to_do_item = $this->model->where('to_do_id', $to_do_id)->find($id);
        if (!$to_do_item) {
            return $to_do_item;
        }
        return (object) $to_do_item->toArray();
    }

    public function delete(string $to_do_id, string $id): void
    {
        $this->model->where('to_do_id', $to_do_id)->findOrFail($id)->delete();
    }

    public function create(CreateToDoItemDTO $dto): stdClass
    {
        $to_do_item = $this->model->create(
            (array) $dto
        );

        return (object) $to_do_item->toArray();
    }

    public function update(UpdateToDoItemDTO $dto): stdClass|null
    {
        if (!$to_do_item = $this->model->find($dto->id)) {
            return null;
        }

        $to_do_item->update(
            (array) $dto
        );

        return (object) $to_do_item->toArray();
    }

}