<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Task;

class SyncTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tasks sync';

    /**
     * Execute the console command.
     * 
     */
    public function handle()
    {
        $tasks = Task::all();
        foreach($tasks as $task){
            if($task->status == "pending"){
                $task->status = "completed";
                $task->save();
            }
        }

        
    }
}
