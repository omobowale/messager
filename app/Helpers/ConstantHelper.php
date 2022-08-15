<?php 

CONST ACTIVE = 1;
CONST PENDING = 0;

function getActive(){
    return ACTIVE;
}

function getPending() {
    return PENDING;
}

function getStatusName($value) {
    if($value == ACTIVE){
        return "Active";
    }
    if($value == PENDING){
        return "Pending";
    }
    return '';
}

function getFullName($firstname, $lastname){
    return $firstname . " " . $lastname;
}