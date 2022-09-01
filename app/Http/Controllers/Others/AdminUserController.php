<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{

    public function index(Request $request){
        $users = User::all()->where("is_admin", "<>", 1);
        $status_name = "";
        if($request->has('status')) {
            $status = $request->status;
            $status_name = getStatusName($status);
            if($status_name != ''){
                $users = $users->where('is_active', "=", $status)->sortByDesc('created_at');
            }
        }
        return view('admin.users')->with('users', $users)->with('status_name', $status_name);
    }

    public function activate(Request $request){
        $this->toggle($request, 1, "Activation successful");
        return redirect()->back();
    }

    public function deactivate(Request $request){
        $this->toggle($request, 0, "Deactivation successful");
        return redirect()->back();
    }

    public function toggle(Request $request, $value, $message){
        $user_id = $request->user_id;
        $user = User::find($user_id);
        $user->is_active = $value;
        if($user->save()) {
            session()->flash('activation_deactivation_success', $message);
        }else {
            session()->flash('activation_deactivation_error', 'Action could not be performed! Please try again later');
        }
    }
}
