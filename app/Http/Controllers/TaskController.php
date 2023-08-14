<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TaskController extends Controller
{
   public function index(){
    $tasks = Task::all();
    return view('dashboard', compact('tasks'));
   }
   

    public function create(){
        return view('create');
    }

    public function store(TaskRequest $request){

        $response = Http::get('https://jsonplaceholder.typicode.com/todos/1');
        $jsonData = $response->json();
        // dd($jsonData);
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->api_id =  $jsonData['id'];
        $task->save();

        return redirect()->route('task.list');
    }

    public function edit($id){
        $task = Task::find($id);
        return view('edit', compact('task'));
    }

    public function update(TaskRequest $request,$id ){
        $task = Task::find($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->save();
        return redirect()->route('task.list');
    }

    public function delete($id){

        Task::find($id)->delete();

        return redirect()->route('task.list');
    }
}
