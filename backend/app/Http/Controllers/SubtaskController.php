<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class SubtaskController extends Controller
{
    public function store(Request $request, $taskId)
    {
        // Crea una nueva subtarea para una tarea principal específica
        $task = Task::find($taskId);
        $subtask = $task->subtasks()->create($request->all());
        return response()->json(['subtask' => $subtask]);
    }

    // Otros métodos como update() y destroy() para subtareas
}

