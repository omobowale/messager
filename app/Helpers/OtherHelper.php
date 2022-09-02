<?php

use App\Models\Task;
use App\Models\TaskStatus;
use Illuminate\Support\Facades\Session;

function loggedInUserIsAdmin(){
    $res1 = auth()->user()->isAdmin();
    $res2 = Session::has('is_admin');
    $res = $res1 && $res2;
    return $res;
}

function loggedInUserAsRegularUser(){
    $res = Session::has('is_regular_user');
    return $res;
}

function changeAllDueTasksToOverdue(){
    $now = new DateTime();
    $status = getOverdueStatus();
    if($status >= 0){
        Task::where("deadline", "<", $now)->update(['status_id' => $status]);
    }
}
function getOverdueStatus() {
    $status = TaskStatus::where("name", 'like', "%" . "DUE". "%")->get();
    if(count($status) > 0){
        $status = $status[0]->id;
    }else {
        $status = -1;
    }
    return $status;
}