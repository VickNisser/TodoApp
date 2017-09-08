<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Task;

class TodoController extends Controller
{
    public function index() {
        $tasks = Task::orderBy('created_at', 'asc')->get();
    
        return view('welcome', [
            'tasks' => $tasks
        ]);
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:55',
        ]);
    
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
    
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
}
