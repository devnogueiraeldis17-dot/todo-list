<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Listar tarefas
    public function index()
    {
        $tasks = Task::latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    // Salvar nova tarefa
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Task::create($data);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tarefa cadastrada com sucesso!');
    }

    // Marcar como concluída ou pendente
    public function toggle(Task $task)
    {
        $task->update([
            'completed' => !$task->completed,
        ]);

        return redirect()->route('tasks.index');
    }

    // Excluir tarefa
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tarefa excluída com sucesso!');
    }
}
