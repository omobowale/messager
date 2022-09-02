<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\TaskCategory;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public $taskLimit = 5;

    public function index() {
        changeAllDueTasksToOverdue();
        $users = User::all();
        if(loggedInUserIsAdmin()){
            $tasks = Task::all();
        }else {
            $user = Auth::user();
            $tasks = $user->tasks;
        }
        $tasksCount = $tasks->count();
        $usersCount = $users->count();
        $fewTasks = $tasks->sortByDesc('updated_at')->take($this->taskLimit);
        $fewUsers = $users->sortByDesc('created_at')->take($this->taskLimit);
        $categories = TaskCategory::all()->where('status', true);
        $statuses = TaskStatus::all();
        return view('user/dashboard')->with(['fewTasks' => $fewTasks, 'usersCount' => $usersCount, 'tasksCount' => $tasksCount, 'categories' => $categories, 'statuses' => $statuses, 'fewUsers' => $fewUsers]);
    }
}
