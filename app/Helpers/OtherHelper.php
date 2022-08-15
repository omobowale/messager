<?php
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
