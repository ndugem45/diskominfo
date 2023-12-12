<?php 
    session_start();

    if(empty($_SESSION["user"])){
        header("Location: http://localhost/diskominfo/login.php");
        die();
    }

    require('dbConnect.php');

    $sql = "SELECT *, uc.id as uc_id, u.id as user_id, c.id as course_id FROM userCourse as uc join users as u on uc.id_user = u.id join courses as c on uc.id_course = c.id";
    $result = $conn->query($sql);
    $array = array();

    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {
            $a = array(
                'uc_id' => $row["uc_id"],
                'c_id' => $row["course_id"],
                'u_id' => $row["user_id"],
                'course' =>  $row["course"],
                'username' =>  $row["username"]
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
	<title>diskominfo - user courses</title>
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
            User Courses
            <a href="addusercourse.php">
                Add User Course
            </a>
        </div>

        <div class="content user">
            <table>
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>User</td>
                        <td>Course</td>
                        <td colspan="2">Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($array as $key => $uc){ ?>
                        <tr>
                            <td>
                                <?php echo $key+1;?>
                            </td>
                            <td>
                                <?php echo $uc['username']?>
                            </td>
                            <td>
                                <?php echo $uc['course'] ?>
                            </td>
                            <td>
                                <a href="addusercourse.php?id=<?php echo $uc['uc_id']; ?>">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <a href="delusercourseController.php?id=<?php echo $uc['uc_id']; ?>">
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
