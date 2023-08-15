<?php

namespace App\Observers;

use App\Models\Task;
use Illuminate\Support\Facades\Http;

class TaskObserver
{
    /**
     * Handle the Task "created" event.
     */
    public function created(Task $task): void
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/todos/1');
        $jsonData = $response->json();
        $task->api_id = $jsonData['id'];
        $task->save();
    }

    /**
     * Handle the Task "updated" event.
     */
    public function updated(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "deleted" event.
     */
    public function deleted(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "restored" event.
     */
    public function restored(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "force deleted" event.
     */
    public function forceDeleted(Task $task): void
    {
        //
    }
}
