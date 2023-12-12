<?php 
    session_start();

    if(empty($_SESSION["user"])){
        header("Location: http://localhost/diskominfo/login.php");
        die();
    }

    require('dbConnect.php');

    $sql = "SELECT u.id, u.username, c.course, c.mentor, c.title FROM users as u join userCourse as uc on u.id = uc.id_user join courses as c on c.id = uc.id_course;";
    $result = $conn->query($sql);
    $array = array();

    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {
            $a = array(
                'id' => $row["id"],
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
	<title>diskominfo - dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
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
            Dashboard
        </div>

        <div class="content">
            <?php print_r($array); ?>
        </div>
    </main>

</body>
</html>
