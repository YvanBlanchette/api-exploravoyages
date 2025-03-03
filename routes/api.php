<?php

use App\Http\Controllers\CallbackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware(['auth:sanctum'])->group(function () {
Route::get('/callbacks', [CallbackController::class, 'index']);
Route::get('/callbacks/{id}', [CallbackController::class, 'show']);
Route::post('/callbacks', [CallbackController::class, 'store']);
Route::put('/callbacks/{id}', [CallbackController::class, 'update']);
Route::delete('/callbacks/{id}', [CallbackController::class, 'destroy']);
// });

