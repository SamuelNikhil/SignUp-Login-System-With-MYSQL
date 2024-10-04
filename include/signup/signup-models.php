<?php

declare(strict_types=1);

function check_username(object $pdo,string $username){

    $query = "SELECT Username FROM users WHERE Username = :username ";

    $stmt =$pdo -> prepare($query);
    $stmt -> bindparam(":username", $username);
    $stmt -> execute();

    $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    return $result;
}

function check_email($email ,$pdo){

    $query = "SELECT Email FROM users WHERE Email = :email ";

    $stmt =$pdo -> prepare($query);
    $stmt -> bindparam(":email", $email);
    $stmt -> execute();

    $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    return $result;
}


function Signup_data(object $pdo,string $username,string $password,string $email){

    $query = "INSERT INTO users (Username, Pwd, Email) VALUES (:username, :pass, :email)";

    $stmt = $pdo -> prepare($query);

    $option = [

        'cost' => 12    
    ];

    $hashpwd = password_hash($password, PASSWORD_BCRYPT, $option);

    $stmt -> bindparam(":username", $username);
    $stmt -> bindparam(":pass", $hashpwd);
    $stmt -> bindparam(":email", $email);
    $stmt -> execute();
}