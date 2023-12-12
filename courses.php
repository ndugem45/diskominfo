<?php 
    session_start();

    if(empty($_SESSION["user"])){
        header("Location: http://localhost/diskominfo/login.php");
        die();
    }

    require('dbConnect.php');

    $sql = "SELECT * FROM courses";
    $result = $conn->query($sql);
    $array = array();

    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {
            $a = array(
                'id' => $row["id"],
                'course' =>  $row["course"],
                'mentor' =>  $row["mentor"],
                'title' =>  $row["title"]
            );
            array_push($array, $a);
        }
    }
    
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>diskominfo - courses</title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<body>

    <nav class="sidebar" >
        <div class="user-box">
            <img src=""/>
            <label>
                <?php echo $_SESSION['user']; ?>
            </label>
        </div>

        <div class="menu-wrapper">
            <a href="index.php">
                Dashboard
            </a>
            <a href="users.php">
                Users
            </a>
            <a href="courses.php">
                Course
            </a>
            <a href="usercourse.php">
                User Course
            </a>
        </div>

        <a href="logoutController.php" class="logout">
            Logout
        </a>
    </nav>

    <main class="main-content">
        <div class="content-title">
            Courses
            <a href="addcourse.php">
                Add Course
            </a>
        </div>

        <div class="content user">
            <table>
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>Course</td>
                        <td>Mentor</td>
                        <td colspan="2">Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($array as $key => $course){ ?>
                        <tr>
                            <td>
                                <?php echo $key+1;?>
                            </td>
                            <td>
                                <?php echo $course['course']?>
                            </td>
                            <td>
                                <?php echo $course['mentor']." ".$course['title']?>
                            </td>
                            <td>
                                <a href="addcourse.php?id=<?php echo $course['id']; ?>">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <a href="delcourseController.php?id=<?php echo $course['id']; ?>">
                                    Delete
                                </a>    
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>
