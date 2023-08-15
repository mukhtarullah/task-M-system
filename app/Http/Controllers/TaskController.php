<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\TaskService;
class TaskController extends Controller
{

    const BASE_PATH = 'tasks.';
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        return view(self::BASE_PATH.'dashboard', ['tasks' => $this->taskService->getAll()]);
    }

    public function create()
    {
        return view(self::BASE_PATH.'create');
    }

    public function store(TaskRequest $request)
    {        
        Task::create($request->all());
        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        return view(self::BASE_PATH.'edit', ['task' => $this->taskService->edit($task)]);
    }

    public function update(TaskRequest $request,Task $task)
    {
        $this->taskService->update($request->all(), $task);
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $this->taskService->delete($task);
        return redirect()->route('tasks.index');
    }
}
