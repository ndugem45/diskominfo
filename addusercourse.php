<?php 
    session_start();

    if(empty($_SESSION["user"])){
        header("Location: http://localhost/diskominfo/login.php");
        die();
    }

    require('dbConnect.php');

    $array = array();
    $users = array();
    $courses = array();

    if(!empty($_GET['id'])){

        $sql = "SELECT * FROM userCourse where id=".$_GET['id'];
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        
            while($row = $result->fetch_assoc()) {
                $a = array(
                    'id' => $row["id"],
                    'id_course' =>  $row["id_course"],
                    'id_user' =>  $row["id_user"]
                );
                array_push($array, $a);
            }
        }
    }

    $sqlu = "SELECT * FROM users";
    $user = $conn->query($sqlu);
    
    if ($user->num_rows > 0) {
    
        while($row = $user->fetch_assoc()) {
            $a = array(
                'id' => $row["id"],
                'username' =>  $row["username"]
            );
            array_push($users, $a);
        }
    }

    $sqlc = "SELECT * FROM courses";
    $course = $conn->query($sqlc);

    if ($course->num_rows > 0) {
    
        while($row = $course->fetch_assoc()) {
            $a = array(
                'id' => $row["id"],
                'course' =>  $row["course"]
            );
            array_push($courses, $a);
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
            Add Course
        </div>

        <div class="content login">
            <form action="addusercourseController.php<?php echo !empty($_GET['id']) ? '?id='.$_GET['id'] : '' ; ?>" method="post">
                <select name="id_user">
                    <?php foreach($users as $key => $user) { ?>
                        <option value="<?php echo $user['id']; ?>" <?php echo !empty($_GET['id']) && ($array[0]['id_user'] == $user['id']) ? 'selected' : ''?>>
                            <?php echo $user['username']; ?>
                        </option>
                    <?php } ?>
                </select>
                <select name="id_course">
                    <?php foreach($courses as $key => $course) { ?>
                        <option value="<?php echo $course['id']; ?>" <?php echo !empty($_GET['id']) && ($array[0]['id_course'] == $course['id']) ? 'selected' : ''?>>
                            <?php echo $course['course']; ?>
                        </option>
                    <?php } ?>
                </select>
                <input type="hidden" name="id" value="<?php echo !empty($_GET['id']) ? $_GET['id'] : null ?>"/>
                <button type="submit">
                    <?php echo !empty($_GET['id']) ? 'Update' : 'Submit' ; ?>
                </button>
            </form>
        </div>
    </main>

</body>
</html>
