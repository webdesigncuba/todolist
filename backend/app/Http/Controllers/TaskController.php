<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        // Retorna todas las tareas principales
        $tasks = Task::with('subtasks')->get();
        return response()->json(['tasks' => $tasks]);
    }

    public function show($id)
    {
        // Retorna una tarea principal con sus subtareas
        $task = Task::with('subtasks')->find($id);
        return response()->json(['task' => $task]);
    }

    public function store(Request $request)
    {
        // Crea una nueva tarea principal
        $task = Task::create($request->all());
        return response()->json(['task' => $task]);
    }

    public function update(Request $request, $id)
    {
        // Encuentra la tarea por su ID
        $task = Task::find($id);
        
        if (!$task) {
            return response()->json(['error' => 'Tarea no encontrada'], 404);
        }

        // Actualiza la tarea
        $task->update($request->all());
        return response()->json(['task' => $task]);
    }

    public function destroy($id)
    {
        // Encuentra la tarea por su ID y elimínala
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['error' => 'Tarea no encontrada'], 404);
        }

        $task->delete();
        return response()->json(['message' => 'Tarea eliminada correctamente']);
    }
}

