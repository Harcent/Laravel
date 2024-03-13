<?php

namespace App\Http\Controllers;

use App\Services\ToDoService;
use Illuminate\Http\Request;

class ToDoItemController extends Controller
{
    public function __construct(
        protected ToDoService $service
    ) {}

    public function index(string $id) 
    {
        if(!$to_do = $this->service->getById($id)) {
            return back();
        }

        return view('to-dos.items.index', compact('to_do'));
    }
}
