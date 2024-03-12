<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateToDo;
use App\Models\ToDo;
use Illuminate\Http\Request;
class ToDoController extends Controller
{
    public function index(ToDo $to_do)
    {
        $to_dos = $to_do->all();
        return view('to-dos/index', compact('to_dos'));
    }

    public function create()
    {
        return view('to-dos/create');
    }

    public function store(StoreUpdateToDo $request, ToDo $to_do)
    {
        $data = $request->validated();
        $to_do->create($data);
        
        return redirect()->route('to-dos.index');
    }

    public function show(string $id)
    {
        if(!$to_do = ToDo::find($id)) {
            return back();
        }
        return view('to-dos/show', compact('to_do'));
    }

    public function edit(string $id)
    {
        if(!$to_do = ToDo::find($id)) {
            return back();
        }
        return view('to-dos/edit', compact('to_do'));
    }

    public function update(StoreUpdateToDo $request, string $id)
    {
        if(!$to_do = ToDo::find($id)) {
            return back();
        }
        $to_do->update($request->validated());
        return redirect()->route('to-dos.show', ['id' => $to_do->id]);
    }

    public function delete(string $id)
    {
        if(!$to_do = ToDo::find($id)) {
            return back();
        }
        $to_do->delete();
        return redirect()->route('to-dos.index');
    }
}
