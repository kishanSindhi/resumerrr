<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <center>
        <br>
        <div style="width:23rem" action="#">
            <form method="get">
                <input type="text" name="name" id="name" placeholder="Enter your name"><br>
                <input type="text" name="uname" id="uname" placeholder="Enter your uname"><br>
                <input type="tel" name="ph" id="ph" placeholder="Enter your phone number"><br>
                <input type="email" name="email" id="email" placeholder="Enter your email"><br>
                <input type="password" name="pass" id="pass" placeholder="Enter your password"><br>
                <input type="submit" value="Signup.." class="button primary" name="signup"> <br><br> Already a user..? <a href="login.php">Login</a>
            </form>
        </div>
        <?php 
            session_start();
            if (isset($_REQUEST['signup'])) 
            {   
                include "mainclass.php";
                $db = new mainclass();

                $name = $_REQUEST['name'];
                $uname = $_REQUEST['uname'];
                $ph = $_REQUEST['ph'];
                $email = $_REQUEST['email'];
                $pass = $_REQUEST['pass'];

                $foo = $db->regUser($name, $email, $ph, $uname, $pass);
                if ($foo == 1) 
                {   
                    $_SESSION['uname'] = $uname;
                    header("location:home.php");
                }
                else 
                {
                    echo "Something went wrong.. :(";
                }
            }
        ?>
    </center>
</body>
</html>



