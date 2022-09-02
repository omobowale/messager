<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\TaskCategory;
use App\Models\TaskStatus;
use DateTime;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index() {
        changeAllDueTasksToOverdue();
        if(loggedInUserIsAdmin()){
            $tasks = Task::all();
        }else {
            $user = auth()->user();
            $tasks = $user->tasks;
        }
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

        $status = $this->getStatusAndMessage($request)[0];
        $additional_message = $this->getStatusAndMessage($request)[1];

        $task = Task::create([
            'title' => $request->title,
            'category_id' => $request->category,
            'status_id' => $status,
            'deadline' => $request->deadline,
            'user_id' => $user_id
        ]);

        return redirect()->back()->with('task_created', "Task successfully created. $additional_message");
    }

    public function getStatusAndMessage($request){
        $additional_message = "";

        $deadline = new DateTime($request->deadline);
        $current_date = new DateTime();

        if ($deadline < $current_date)
        {
            $status = TaskStatus::where("name", 'like', "%" . "DUE". "%")->get();
            if(count($status) > 0){
                $status = $status[0]->id;
                $additional_message = "Deadline is passed and status has been changed to overdue";
            }
            else {
                $status = $request->status;
            }
        } else {
            $status = $request->status;
        }

        return [$status, $additional_message];
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

        $status = $this->getStatusAndMessage($request)[0];
        $additional_message = $this->getStatusAndMessage($request)[1];

        $task = Task::find($id);
        $task->title = $request->title;
        $task->category_id = $request->category;
        $task->status_id = $status;
        $task->deadline = $request->deadline;
        $task->user_id = $user_id;

        $task->save();

        return redirect()->back()->with('task_created', 'Task successfully updated. ' . $additional_message);
    }


    public function delete($id) {
        $task = Task::find($id);
        $task->delete();
        return redirect()->back()->with('task_created', 'Task successfully deleted');
    }
}
