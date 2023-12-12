<?php 
    session_start();

    if(empty($_SESSION["user"])){
        header("Location: http://localhost/diskominfo/login.php");
        die();
    }

    require('dbConnect.php');

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    $array = array();

    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {
            $a = array(
                'id' => $row["id"],
                'username' =>  $row["username"],
                'email' =>  $row["email"]
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
	<title>diskominfo - users</title>
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
            Users
            <a href="adduser.php">
                Add User
            </a>
        </div>

        <div class="content user">
            <table>
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>Username</td>
                        <td>Email</td>
                        <td colspan="2">Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($array as $key => $user){ ?>
                        <tr>
                            <td>
                                <?php echo $key+1;?>
                            </td>
                            <td>
                                <?php echo $user['username']?>
                            </td>
                            <td>
                                <?php echo $user['email']?>
                            </td>
                            <td>
                                <a href="adduser.php?id=<?php echo $user['id']; ?>">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <a href="deluserController.php?id=<?php echo $user['id']; ?>">
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
