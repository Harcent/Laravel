<?php

use App\Http\Controllers\Api\ToDoController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/to-dos', ToDoController::class);