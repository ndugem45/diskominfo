<?php

    $type = $_GET['type'];
    $sql;

    switch($type){
        case 5:
            $sql = "SELECT username, course, mentor, title from users as u join userCourse as uc on u.id = uc.id_user join courses as c on c.id = uc.id_course;";
        break;
        case 6:
            $sql = "SELECT username, course, mentor, title from users as u join userCourse as uc on u.id = uc.id_user join courses as c on c.id = uc.id_course where c.title not like '%S%';";
        break;
        case 7:
            $sql = "SELECT c.id, c.course, c.mentor, c.title, (Select count(*) from userCourse where id_course = id) as jumlah_peserta FROM courses as c;";
        break;
        case 8:
            $sql = "SELECT c.mentor, (Select count(*) from users as u join userCourse as uc on u.id = uc.id_user ) as jumlah_peserta FROM courses as c group by mentor;";
        break;
    }

    if(!empty($aql)){
        require('dbConnect.php');

        $result = $conn->query($sql);
        $array = array();

        if ($result->num_rows > 0) {
        
            while($row = $result->fetch_assoc()) {
                array_push($array, $row);
            }


            print json_encode($array);
        }
        
        $conn->close();
    }else{
        echo "api.php?type=[nomor soal]";
    }