<?php 
    session_start();

    if(empty($_SESSION["user"])){
        header("Location: http://localhost/diskominfo/login.php");
        die();
    }else{
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $id = isset($_POST['id']) ? $_POST['id'] : false;
        
        if(
            (!empty($username) && !empty($password) && !empty($email))
        ){
            require('dbConnect.php');

            if($id){
                $sql = "update users set username='".$username."', email='".$email."', password='".$password."' where id=".$id;
            }else{
                $sql = "insert into users (username, email, password) values('".$username."','".$email."','".$password."')";
            }
                $result = $conn->query($sql);

            if ($result) {
                header("Location: http://localhost/diskominfo/users.php");
                die();
            }else{
                header("Location: http://localhost/diskominfo/adduser.php");
                die();
            }
            
            $conn->close();
        }else{
            header("Location: http://localhost/diskominfo/adduser.php");
            die();
        }
    }