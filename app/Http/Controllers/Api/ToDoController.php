<?php

namespace App\Http\Controllers\Api;

use App\DTO\ToDo\CreateToDoDTO;
use App\DTO\ToDo\UpdateToDoDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateToDo;
use App\Http\Resources\ToDoResource;
use App\Services\ToDoService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ToDoController extends Controller
{
    public function __construct(
        protected ToDoService $service
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $to_dos = $this->service->getAll(
            filter: $request->filter
        );
        return ToDoResource::collection($to_dos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateToDo $request)
    {
        $to_do = $this->service->create(
            CreateToDoDTO::makeFromRequest($request)
        );

        return (new ToDoResource($to_do))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$to_do = $this->service->getById($id))
        {
            return response()->json([
                'error' => 'Not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new ToDoResource($to_do);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateToDo $request, string $id)
    {
        $to_do = $this->service->update(
            UpdateToDoDTO::makeFromRequest($request, $id)
        );

        if(!$to_do) { 
            return response()->json([
                'error' => 'Not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new ToDoResource($to_do);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$this->service->getById($id))
        {
            return response()->json([
                'error' => 'Not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
