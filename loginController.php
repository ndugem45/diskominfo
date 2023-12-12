<?php 
    session_start();

    if(empty($_POST["username"])){
        header("Location: http://localhost/diskominfo/login.php");
        die();
    }else{
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if(
            (!empty($username) && !empty($password)) &&
            ($username == 'admin') &&
            ($password == 'admin')
        ){
            $_SESSION["error_login"] = false;
            $_SESSION["user"] = $username;
            header("Location: http://localhost/diskominfo/index.php");
            die();
        }else{
            $_SESSION["error_login"] = true;
            header("Location: http://localhost/diskominfo/login.php");
            die();
        }
    }