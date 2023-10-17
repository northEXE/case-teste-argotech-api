<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/to-do-list', [TaskController::class, 'index']);
Route::post('/to-do-list', [TaskController::class, 'store']);
Route::put('/to-do-list/{id}', [TaskController::class, 'update']);
Route::put('/to-do-list/{id}/markAsDone', [TaskController::class, 'markAsDone']);
Route::put('/to-do-list/{id}/markAsUndone', [TaskController::class, 'markAsUndone']);
Route::delete('/to-do-list/{id}', [TaskController::class, 'delete']);

Route::get('/', function () {
    return response()->json([
        'success' => true
    ]);
});
