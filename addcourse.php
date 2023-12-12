<?php 
    session_start();

    if(empty($_SESSION["user"])){
        header("Location: http://localhost/diskominfo/login.php");
        die();
    }

    require('dbConnect.php');
    
    if(!empty($_GET['id'])){
        $sql = "SELECT * FROM courses where id=".$_GET['id'];
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
    }
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
            Add Course
        </div>

        <div class="content login">
            <form action="addcourseController.php<?php echo !empty($_GET['id']) ? '?id='.$_GET['id'] : '' ; ?>" method="post">
                <input type="text" name="course" placeholder="Nama course" value="<?php echo !empty($_GET['id']) ? $array[0]['course'] : '' ; ?>" required/>
                <input type="text" name="mentor" placeholder="Nama mentor" value="<?php echo !empty($_GET['id']) ? $array[0]['mentor'] : '' ; ?>" required/>
                <input type="text" name="title" placeholder="Title mentor" value="<?php echo !empty($_GET['id']) ? $array[0]['title'] : '' ; ?>" required/>
                <input type="hidden" name="id" value="<?php echo !empty($_GET['id']) ? $_GET['id'] : null ?>"/>
                <button type="submit">
                    <?php echo !empty($_GET['id']) ? 'Update' : 'Submit' ; ?>
                </button>
            </form>
        </div>
    </main>

</body>
</html>
