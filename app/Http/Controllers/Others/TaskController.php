<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\TaskCategory;
use App\Models\TaskStatus;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() {
        $tasks = Task::all();
        $categories = TaskCategory::all()->where('status', true);
        $statuses = TaskStatus::all();
        return view("user/tasks")->with(["tasks" => $tasks, "categories" => $categories, "statuses" => $statuses]);
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        
        $request->validate([
            'title' => ['required', 'string', 'min:2'],
            'category' => ['required', 'numeric'],
            'status' => ['required', 'numeric'],
            'deadline' => ['required', 'date'],
        ], [
            'category.numeric' => 'Please select a valid category',
            'status.numeric' => 'Please select a valid status'
        ]);


        $task = Task::create([
            'title' => $request->title,
            'category_id' => $request->category,
            'status_id' => $request->status,
            'deadline' => $request->deadline,
            'user_id' => $user_id
        ]);

        return redirect()->back()->with('task_created', 'Task successfully created');
    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        
        $request->validate([
            'title' => ['required', 'string', 'min:2'],
            'category' => ['required', 'numeric'],
            'status' => ['required', 'numeric'],
            'deadline' => ['required', 'date'],
        ], [
            'category.numeric' => 'Please select a valid category',
            'status.numeric' => 'Please select a valid status'
        ]);


        $task = Task::find($id);
        $task->title = $request->title;
        $task->category_id = $request->category;
        $task->status_id = $request->status;
        $task->deadline = $request->deadline;
        $task->user_id = $user_id;

        $task->save();

        return redirect()->back()->with('task_created', 'Task successfully updated');
    }


    public function delete($id) {
        $task = Task::find($id);
        $task->delete();
        return redirect()->back()->with('task_created', 'Task successfully deleted');
    }
}
