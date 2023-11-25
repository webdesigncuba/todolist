<?php

use App\Http\Controllers\SubtaskController;
use Illuminate\Http\Request;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('tasks', [TaskController::class, 'index']);
Route::get('tasks/{id}', [TaskController::class, 'show']);
Route::post('tasks', [TaskController::class, 'store']);
Route::put('tasks/{id}', [TaskController::class, 'update']);
Route::delete('tasks/{id}', [TaskController::class, 'destroy']);

Route::post('tasks/{taskId}/subtasks', [SubtaskController::class, 'store']);
Route::put('tasks/{taskId}/subtasks/{subtaskId}', [SubtaskController::class, 'update']);
Route::delete('tasks/{taskId}/subtasks/{subtaskId}', [SubtaskController::class, 'destroy']);

