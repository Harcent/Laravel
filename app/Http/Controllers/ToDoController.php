<?php

namespace App\Http\Controllers;

use App\DTO\CreateToDoDTO;
use App\DTO\UpdateToDoDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateToDo;
use App\Services\ToDoService;
use Illuminate\Http\Request;
class ToDoController extends Controller
{
    public function __construct(
        protected ToDoService $service
    ) {}

    public function index(Request $request)
    {
        $to_dos = $this->service->getAll($request->filter);
        return view('to-dos/index', compact('to_dos'));
    }

    public function create()
    {
        return view('to-dos/create');
    }

    public function store(StoreUpdateToDo $request)
    {
        $this->service->create(
            CreateToDoDTO::makeFromRequest($request)
        );
        
        return redirect()->route('to-dos.index');
    }

    public function show(string $id)
    {
        if(!$to_do = $this->service->getById($id)) {
            return back();
        }
        return view('to-dos/show', compact('to_do'));
    }

    public function edit(string $id)
    {
        if(!$to_do = $this->service->getById($id)) {
            return back();
        }
        return view('to-dos/edit', compact('to_do'));
    }

    public function update(StoreUpdateToDo $request)
    {
        $to_do = $this->service->update(
            UpdateToDoDTO::makeFromRequest($request)
        );

        if(!$to_do) {
            return back();
        }

        return redirect()->route('to-dos.show', ['id' => $to_do->id]);
    }

    public function delete(string $id)
    {
        $this->service->delete($id);

        return redirect()->route('to-dos.index');
    }
}
