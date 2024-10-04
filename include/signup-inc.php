<?php

    //checks whether the server is POST method from index.html
    if ($_SERVER[ 'REQUEST_METHOD '] = 'POST'){

        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];


        try {

            //Including or importing the files
            require_once "dbh-inc.php";
            require_once "signup/signup-models.php";
            require_once "signup/signup-contr.php";

            //Error Handlers
            $errors = [];

            if(is_input_empty($username, $password, $email)){

                $errors['empty_input'] = "Fill in all fields!";
            }

            if(is_username_taken($pdo, $username)){

                $errors['username_taken'] = "Username already taken !";
            }

            if (is_input_email($email)){

                $errors['invalid_email'] = "Invalid Email !";
            }

            if (is_email_taken($pdo, $email)){

                $errors ['email_taken'] = "Email already taken !";
            }

            require_once "config-session-inc.php";

            if($errors){

                $_SESSION["ERROR_SIGNUP"] = $errors;

                $signup_data = [

                    'username' => $username,
                    'password' => $password,
                    'email'    => $email
                ];

                $_SESSION["SIGNUP_DATA"] = $signup_data;

                header("Location: ../index.php");
                die();

            }

            create_acc($pdo ,$username ,$password ,$email);

            header("Location: ../index.php?signup=success");
            
            $pdo = null;
            $stmt = null;

            die();
        }
        catch (PDOEXCEPTION $e){

            die("Qurey Error :" . $e -> getmessage());
        }
    }else{

        //if the server is not POST method
        header("location: ../index.php");
        die();
    }