<?php 
    session_start();

    if(empty($_SESSION["user"])){
        header("Location: http://localhost/diskominfo/login.php");
        die();
    }else{
        $id_course = $_POST['id_course'];
        $id_user = $_POST['id_user'];
        $id = isset($_POST['id']) ? $_POST['id'] : false;
        
        if(
            (!empty($id_user) && !empty($id_course))
        ){
            require('dbConnect.php');

            if($id){
                $sql = "update userCourse set id_user='".$id_user."', id_course='".$id_course."' where id=".$id;
            }else{
                $sql = "insert into userCourse (id_user, id_course) values('".$id_user."','".$id_course."')";
            }
                $result = $conn->query($sql);

            if ($result) {
                header("Location: http://localhost/diskominfo/usercourse.php");
                die();
            }else{
                header("Location: http://localhost/diskominfo/addusercourse.php");
                die();
            }
            
            $conn->close();
        }else{
            header("Location: http://localhost/diskominfo/addusercourse.php");
            die();
        }
    }