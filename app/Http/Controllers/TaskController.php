<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Task;

class TaskController extends Controller
{
    public function mainPage()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();
        return view('index', [
            'tasks' => $tasks
        ]);
    }

    public function addTask(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    }

    public function deleteTask(Task $task){
        $task->delete();
        return redirect('/');
    }
}
