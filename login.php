<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <br>
    <center>
        <div style="width:23rem" class="border">
            <form method="post">
                <input type="text" name="uname" id="uname" placeholder="Enter your username"><br>
                <input type="password" name="pwd" id="pwd" placeholder="Enter your password"><br>
                <input type="submit" value="Login" class="button primary" name="login"> <br><br>
                <b>Not a user...?</b> 
                <a href="signup.php">Signup</a>
            </form>
        </div>
        <?php
            session_start();
            require "mainclass.php";
            $db = new mainclass();
            if (isset($_REQUEST['login'])) {
                $uname = $_REQUEST['uname'];
                $pwd = $_REQUEST['pwd'];
                $foo = $db->login($uname, $pwd);
                
                if ($foo == 1) {
                    header("location:home.php");
                    $_SESSION['uname'] = $uname;
                } else {
                    echo "Enter valid credentials";
                }
            }
        ?>
    </center>
</body>
</html>

