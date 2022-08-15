<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

function loggedInUserIsAdmin(){
    $res1 = Auth::user()->isAdmin();
    $res2 = Session::has('is_admin');
    $res = $res1 && $res2;
    // var_dump($res2);
    return $res;
    
}
