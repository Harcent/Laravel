<?php

namespace App\Http\Controllers\Api;

use App\DTO\ToDoItem\CreateToDoItemDTO;
use App\DTO\ToDoItem\UpdateToDoItemDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateToDoItem;
use App\Http\Resources\ToDoItemResource;
use App\Services\ToDoItemService;
use App\Services\ToDoService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ToDoItemController extends Controller
{
    public function __construct(
        protected ToDoItemService $toDoItemService,
        protected ToDoService $toDoService
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!$to_do = $this->toDoService->getById($request->id))
        {
            return response()->json([
                'error' => 'Not found'
            ], Response::HTTP_NOT_FOUND);
        }
        $to_do_items = $this->toDoItemService->getAll(
            to_do_id: $request->id,
            filter: $request->filter,
        );
        return ToDoItemResource::collection($to_do_items);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateToDoItem $request)
    {
        $to_do_item = $this->toDoItemService->create(
            CreateToDoItemDTO::makeFromRequest($request)
        );

        return (new ToDoItemResource($to_do_item))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        if (!$to_do_item = $this->toDoItemService->getById($request->id, $request->item))
        {
            return response()->json([
                'error' => 'Not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new ToDoItemResource($to_do_item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateToDoItem $request)
    {
        $to_do_item = $this->toDoItemService->getById($request->id, $request->item);
        $to_do_item = $this->toDoItemService->update(UpdateToDoItemDTO::makeFromRequest($request));
        
        return new ToDoItemResource($to_do_item);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if (!$this->toDoItemService->getById($request->id, $request->item))
        {
            return response()->json([
                'error' => 'Not found'
            ], Response::HTTP_NOT_FOUND);
        }
        $this->toDoItemService->delete($request->to_do_id, $request->id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}