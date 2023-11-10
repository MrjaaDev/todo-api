<?php

use App\Http\Controllers\Task\V1\TaskController;
use Illuminate\Support\Facades\Route;

// api version 1
Route::group(['prefix' => 'v1', 'middleware' => ['auth:sanctum']], function () {
    Route::prefix('/tasks')->group(function () {
        Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
        Route::get('/{id}', [TaskController::class, 'show'])->where('id', '[0-9]+')->name('tasks.show');
        Route::get('/user', [TaskController::class, 'user_tasks'])->name('users.tasks');
        Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
        Route::put('/{id}/toggle', [TaskController::class, 'toggle_done'])->where('id', '[0-9]+')->name('tasks.toggle');
        Route::delete('/{id}', [TaskController::class, 'destroy'])->where('id', '[0-9]+')->name('tasks.toggle');
    });
});
