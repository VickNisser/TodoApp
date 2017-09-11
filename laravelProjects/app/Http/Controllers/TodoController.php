<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Task;
use App\Http\Requests\CreateTaskValidation;

class TodoController extends Controller
{
    public function index() {
        $tasks = Task::orderBy('priority', 'desc')->get();
    
        return view('welcome', [
            'tasks' => $tasks
        ]);
    }

    public function create(CreateTaskValidation $request) {
        
        $task = new Task;
        $task->name = $request->name;
        $task->done = 0;
        $task->save();
        return redirect('/');
    }

    public function delete ($id) {
        Task::findOrFail($id)->delete();
        return redirect('/');
    } 

    public function update ($id) {
        $task = Task::find($id);

        if ($task['done'] == 1) {
            $task->done = 0;
        }
        else {
            $task->done = 1;
        }

        $task->save();
        return redirect('/');
    }

    public function deleteAllCompleted () {
        $tasks = Task::orderBy('created_at', 'asc')->get();

        foreach($tasks as $task){
            if($task['done'] == 1){
                $task->delete(); 
            } 
        }

        return redirect('/');
    }

    public function priorityControl($id) {
        $task = Task::find($id);
        if($task->priority == 5){
            $task->priority = $task->priority = 0;
            $task->save();
            return redirect('/');
        }
        else{
            $task->priority = $task->priority + 1;
            $task->save();
            return redirect('/'); 
        }
        
    }
}
