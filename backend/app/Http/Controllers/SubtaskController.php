<?php

namespace App\Http\Controllers;

use App\Models\Subtask;
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

    public function update(Request $request, $taskId, $subtaskId)
    {
        // Encuentra la subtarea por su ID y el ID de su tarea principal
        $subtask = Subtask::where('task_id', $taskId)->find($subtaskId);

        if (!$subtask) {
            return response()->json(['error' => 'Subtarea no encontrada'], 404);
        }

        // Actualiza la subtarea
        $subtask->update($request->all());
        return response()->json(['subtask' => $subtask]);
    }

    public function destroy($taskId, $subtaskId)
    {
        // Encuentra la subtarea por su ID y el ID de su tarea principal y elimínala
        $subtask = Subtask::where('task_id', $taskId)->find($subtaskId);

        if (!$subtask) {
            return response()->json(['error' => 'Subtarea no encontrada'], 404);
        }

        $subtask->delete();
        return response()->json(['message' => 'Subtarea eliminada correctamente']);
    }
}

