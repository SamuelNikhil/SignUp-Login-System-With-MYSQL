<?php

declare(strict_types=1);

function is_input_empty(string $username,string $password,string $email){

    if(empty($username) || empty($password) || empty($email)){

        return true;
    }else{

        return false;
    }
}

function is_username_taken(object $pdo, string $username){

    if(check_username($pdo, $username)){

       return true;
    }else{

        return false;
    }
}

function is_input_email(string $email){

    if(!filter_var($email ,FILTER_VALIDATE_EMAIL)){

        return true;
    }else{

        return false;
    }
}

function is_email_taken(object $pdo, string $email){

    if(check_email($email ,$pdo)){

        return true;
    }else{

        return false;
    }
}

function create_acc(object $pdo, string $username, string $password, string $email){

    Signup_data($pdo, $username, $password, $email);
}