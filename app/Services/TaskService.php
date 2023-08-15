<?php

namespace App\Services;

use App\Models\Task;

class TaskService{

    public function getAll()
    {
        return Task::all();
    }

    public function store($request)
    {
        return Task::create($request);
    }

    public function getOne($task)
    {
        return $task;
    }

    public function edit($task)
    {
        return $task;
    }

    public function update($request, $task)
    {
        return $task->update($request);
    }

    public function delete($task)
    {
        return $task->delete();
    }

}