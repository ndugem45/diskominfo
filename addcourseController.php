<?php 
    session_start();

    if(empty($_SESSION["user"])){
        header("Location: http://localhost/diskominfo/login.php");
        die();
    }else{
        $course = $_POST['course'];
        $mentor = $_POST['mentor'];
        $title = $_POST['title'];
        $id = isset($_POST['id']) ? $_POST['id'] : false;
        
        if(
            (!empty($course) && !empty($mentor) && !empty($title))
        ){
            require('dbConnect.php');

            if($id){
                $sql = "update courses set course='".$course."', mentor='".$mentor."', title='".$title."' where id=".$id;
            }else{
                $sql = "insert into courses (course, mentor, title) values('".$course."','".$mentor."','".$title."')";
            }
            $result = $conn->query($sql);

            if ($result) {
                header("Location: http://localhost/diskominfo/courses.php");
                die();
            }else{
                header("Location: http://localhost/diskominfo/addcourse.php");
                die();
            }
            
            $conn->close();
        }else{
            header("Location: http://localhost/diskominfo/addcourse.php");
            die();
        }
    }