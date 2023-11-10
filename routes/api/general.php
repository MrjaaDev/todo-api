<?php

use App\Http\Controllers\Task\V1\TaskController;
use Illuminate\Support\Facades\Route;

// api version 1
Route::group(['prefix' => 'v1', 'middleware' => ['auth:sanctum']], function () {
    Route::prefix('/tasks')->group(function () {
        Route::get('/', [TaskController::class, 'index']);
        Route::get('/{id}', [TaskController::class, 'show'])->where('id', '[0-9]+');
        Route::get('/user', [TaskController::class, 'user_tasks']);
    });
});
