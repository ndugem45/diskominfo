<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>diskominfo - login</title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<body>
    <main class="main-content login">
        <div class="content login">
            <h1>
                Login
            </h1>
            <form action="loginController.php" method="post">
                <input type="text" name="username" placeholder="Username" required/>
                <input type="password" name="password" placeholder="Password" required/>
                <button type="submit">
                    Login
                </button>
                <label class="<?php if(isset($_SESSION['error_login']) && $_SESSION['error_login']){ echo 'active'; } ?>">
                    Username atau Password salah 
                </label>
            </form>
        </div>
    </main>

</body>
</html>
