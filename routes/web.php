<?php

use App\Http\Controllers\ToDoController;
use App\Http\Controllers\ToDoItemController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/to-dos/create', [ToDoController::class, 'create'])->name('to-dos.create');
Route::get('/to-dos/{id}/items', [ToDoItemController::class, 'index'])->name('items.index');
Route::get('/to-dos/{id}/edit', [ToDoController::class, 'edit'])->name('to-dos.edit');
Route::put('/to-dos/{id}', [ToDoController::class, 'update'])->name('to-dos.update');
Route::delete('/to-dos/{id}', [ToDoController::class, 'delete'])->name('to-dos.delete');
Route::post('/to-dos', [ToDoController::class, 'store'])->name('to-dos.store');
Route::get('/to-dos', [ToDoController::class, 'index'])->name('to-dos.index');

Route::get('/', function () {
    return view('welcome');
});
