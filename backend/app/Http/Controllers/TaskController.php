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

    // Otros métodos como update() y destroy() para actualizar y eliminar tareas
}

