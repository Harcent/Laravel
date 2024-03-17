<?php

namespace App\Http\Controllers;

use App\DTO\ToDoItem\CreateToDoItemDTO;
use App\DTO\ToDoItem\UpdateToDoItemDTO;
use App\Http\Requests\StoreUpdateToDoItem;
use App\Services\ToDoItemService;
use App\Services\ToDoService;

class ToDoItemController extends Controller
{
    public function __construct(
        protected ToDoService $toDoService,
        protected ToDoItemService $toDoItemService,
    ) {}

    public function index(string $to_do_id) 
    {
        if(!$to_do = $this->toDoService->getById($to_do_id)) {
            return back();
        }

        $to_do_items = $this->toDoItemService->getAll($to_do_id);

        return view('to-dos.items.index', compact('to_do', 'to_do_items'));
    }

    public function store(StoreUpdateToDoItem $request, string $to_do_id) 
    {
        $this->toDoItemService->create(
            CreateToDoItemDTO::makeFromRequest($request)
        );

        return redirect()->route('items.index', $to_do_id);
    }

    public function edit(string $to_do_id, string $item_id) 
    {
        if(!$to_do = $this->toDoService->getById($to_do_id)) {
            return back();
        }

        if(!$to_do_item = $this->toDoItemService->getById($to_do_id, $item_id)) {
            return back();
        }

        return view('to-dos.items.edit', compact('to_do', 'to_do_item'));
    }

    public function update(StoreUpdateToDoItem $request) 
    {
        $this->toDoItemService->update(
            UpdateToDoItemDTO::makeFromRequest($request)
        );

        return redirect()->route('items.index', $request->id);
    }

    public function delete(string $to_do_id, string $item_id) 
    {
        $this->toDoItemService->delete($to_do_id, $item_id);

        return redirect()->route('items.index', $to_do_id);
    }
}
