<?php

function validName($name)
{
    return !empty($name);
}

function validEmail($email)
{
    return (filter_var($email, FILTER_VALIDATE_EMAIL));
}

function validMeeting ($meeting)
{
    if ($meeting === "none") {
        return false;
    }
    else {
        return true;
    }
}

function validateLinkedIn ($linkedIn)
{
    if ( stripos($linkedIn, "http") !== false && stripos($linkedIn, ".com") !== false) {
        return true;
    }
    else {
        return false;
    }
}