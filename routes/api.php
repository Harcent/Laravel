<?php

use App\Http\Controllers\Api\ToDoController;
use App\Http\Controllers\Api\ToDoItemController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/to-dos', ToDoController::class);
Route::apiResource('/to-dos/{id}/items', ToDoItemController::class);