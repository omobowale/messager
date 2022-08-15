<?php 


function flashRegistrationMessage($username, $registration = true){
    if($registration){
        session()->flash('registration_message_title', "You are now registered.");
    }else {
        session()->flash('registration_message_title', "You are a registered user.");
    }
    session()->flash('registration_message', "However, you will be able to log in when the admin approves you registration.");
    session()->flash('user_name', $username);
}

function flashCustomMessage($username){
    session()->flash('admin_login_error_message', "You are likely not an admin.");
    session()->flash('user_name', $username);
}