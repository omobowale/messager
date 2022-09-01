<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;
use App\Models\TaskCategory;
use Illuminate\Http\Request;

class AdminTaskCategoryController extends Controller
{
    public function index() {
        $categories = TaskCategory::all();
        return view("admin/categories")->with(['categories' => $categories]);
    }

    public function store(Request $request){
        $request->validate([
            'title' => ['required', 'string', 'unique:task_categories', 'min:2'],
            'status' => ['required', 'numeric'],
        ]);

        TaskCategory::create([
            'title' => $request->title,
            'status' => $request->status
        ]);

        return redirect()->back()->with('category_action_info', 'Task category successfully created');
    }

    public function update(Request $request, $id){
        $taskcategory = TaskCategory::find($id);
        $taskcategory->status = !$taskcategory->status;
        $taskcategory->save();
        session()->flash('category_action_info', "Category successfully updated");
        return redirect()->back();
    }

    public function delete($id){
        $taskcategory = TaskCategory::find($id);
        $taskcategory->delete();
        session()->flash('category_action_info', "Category successfully deleted");
        return redirect()->back();
    }
}
