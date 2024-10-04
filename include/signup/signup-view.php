<?php

declare(strict_types=1);

function signup_input(){

    if(isset($_SESSION["SIGNUP_DATA"]["username"]) && !isset($_SESSION["ERROR_SIGNUP"]["username_taken"])){
        echo '<input type="text" name="username" placeholder ="username" value="'. $_SESSION["signup_data"]["username"] .'"> <br>';
    }else {
        echo '<input type="text" name="username" placeholder ="username"> <br>';
    }

    echo '<input type="password" name="password" placeholder ="password"> <br>';

    if(isset($_SESSION["SIGNUP_DATA"]["email"]) && !isset($_SESSION["ERROR_SIGNUP"]["email_taken"]) && !isset($_SESSION["ERROR_SIGNUP"]["invalid_email"]) ){
        echo '<input type="email" name="email" placeholder ="email" value="'. $_SESSION["signup_data"]["email"] .'"><br>';
    }else {
        echo '<input type="email" name="email" placeholder ="email"> <br>';
    }
}

function Error_input_signin(){


    if(isset($_SESSION["ERROR_SIGNUP"])){
        
        $errors = $_SESSION["ERROR_SIGNUP"];

        echo "<br>";

        foreach ( $errors as $error){

            echo "<p>" . $error . "</p>";
        }

        unset($_SESSION["ERROR_SIGNUP"]);
    }else if(isset($_GET["signup"]) && $_GET["signup"] === "success"){

            echo "<br>";
            echo "<p> Signup Success !</p>";
        }
}
