<?php 
    session_start();

    if(empty($_SESSION["user"])){
        header("Location: http://localhost/diskominfo/login.php");
        die();
    }else{
        $id = $_GET['id'];
        
        if(
            (!empty($id))
        ){
            require('dbConnect.php');

            $sql = "DELETE FROM courses WHERE id=".$id;
            $result = $conn->query($sql);

            header("Location: http://localhost/diskominfo/courses.php");
            die();
            
            $conn->close();
        }else{
            header("Location: http://localhost/diskominfo/addcourse.php");
            die();
        }
    }