<?php

namespace App\Http\Controllers\Task;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{

    // public function __construct() {
    //     $this->middleware('admin');
    // }

    public function index(Task $task) {

        $tasks = Task::where('user_id', Auth()->user()->id)->with('user')->orderby('status','asc')->get();

        return view('task.index', compact('tasks'));

    }

    public function create() {

        return view('task.create');

    }

    public function store(Request $request, Task $task) {
        
        $request->validate(['title' => 'required|max:255', 'date' => 'required']);

        $data = $task->create(
            [
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'date' => $request->date,
            ]
        );

        return redirect()->route('home')->with('message', 'New Task has been added!');

    }
    public function show(Task $task) {
        return view('task.show', compact('task'));

    }

    public function edit(Task $task) {
        
        return view('task.edit', compact('task'));

    }

    public function update(Request $request, Task $task) {

        $request->validate(['title' => 'required|max:255', 'date' => 'required']);
        $data = $task->update(
            [
                'title' => $request->title,
                'date' => $request->date,
            ]
        );
        
        return redirect()->route('home')->with('message', 'Task has been updated!');
    }
 
    public function destroy(Task $task) {
        $task->delete();

        return redirect()->route('home')->with('message', 'Task has been deleted!');

    }
    
    public function remark(Task $task) {
        if($task->status == 0) {
            $task->update(['status' => 1]);
        }
        else {
            $task->update(['status' => 0]);
        }

        return redirect()->route('home');

    }


}
   