<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index']);

Route::get('/', function () {
    return response()->json([
        'sucess' => true
    ]);
});
