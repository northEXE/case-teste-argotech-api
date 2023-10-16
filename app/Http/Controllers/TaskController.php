<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Http\Resources\TaskResource;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return TaskResource::collection($tasks);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $task = Task::create($data);

        return new TaskResource($task);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $task = Task::findOrFail($id);
        $task->update($data);

        return new TaskResource($task);
    }

    public function delete(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete($id);

        return 'Deletado com sucesso';
    }
    public function markAsDone(string $id)
    {
        $task = Task::findOrFail($id);
        $task->is_completed = true;
        $task->update();

        return new TaskResource($task);
    }

    public function markAsUndone(string $id)
    {
        $task = Task::findOrFail($id);
        $task->is_completed = false;
        $task->update();

        return new TaskResource($task);
    }
}
