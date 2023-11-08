<?php

use App\Http\Controllers\Auth\V1\RegisterController;
use Illuminate\Support\Facades\Route;

// api version 1
Route::prefix('/v1')->group(function (){
    Route::post('/register', RegisterController::class);
});
