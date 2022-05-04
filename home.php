<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Home</title>
</head>
<body>
    <center>
        <div style="width: 80%;">
            <form method="get" action="#">  
                <div class="fields">
                    <div class="field half">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div class="field half">
                        <label for="post">Post</label>
                        <input type="text" name="post" id="post">
                    </div>
                </div>        
                <div class="fields">
                    <div class="field half">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address">
                    </div>
                    <div class="field half">
                        <label for="ph">Phone Number</label>
                        <input type="tel" name="ph" id="ph">
                    </div>
                </div>
                <div class="fields">
                    <div class="field half">
                        <label for="dob">DOB</label>
                        <input type="date" name="dob" id="dob">
                    </div>
                    <div class="field half">
                        <label for="hobbies">Hobbies</label>
                        <input type="text" name="hobbies" id="hobbies">
                    </div>
                </div>
                <div class="fields">
                    <div class="field half">
                        <label for="skills">Skills</label>
                        <input type="text" name="skills" id="skills">
                    </div>
                    <div class="field half">
                        <label for="language">Languages known</label>
                        <input type="text" name="languages" id="languages">
                    </div>
                </div>
                <div class="field">
                    <label for="summary">Professional summary</label>
                    <textarea name="summary" id="summary" cols="30" rows="6"></textarea>
                </div>
                <br>    
                <div class="field">
                    <label for="history">Employment history</label>
                    <textarea name="history" id="history" cols="30" rows="6"></textarea>
                </div><br>
                <div class="fields">
                    <div class="field">
                        <label for="education">Education details</label>
                        <textarea name="education" id="education" cols="30" rows="6"></textarea>
                    </div>
                </div>
                <input type="submit" name="build" id="build" value="Create resume" class="button primary"> 
            </form>
        </div>
    </center>
    <div>
        <?php 
            session_start();
            if (isset($_SESSION['uname'])) {
                if (isset($_REQUEST['build'])) {
                    require "mainclass.php";
                    $db = new mainclass();

                    $uname = $_SESSION['uname'];
                    $name = $_REQUEST['name'];
                    $post = $_REQUEST['post'];
                    $address = $_REQUEST['address'];
                    $ph = $_REQUEST['ph'];
                    $dob = $_REQUEST['dob'];
                    $hobbies = $_REQUEST['hobbies'];
                    $skills = $_REQUEST['skills'];
                    $languages = $_REQUEST['languages'];
                    $summary = $_REQUEST['summary'];
                    $history = $_REQUEST['history'];
                    $education = $_REQUEST['education'];

                    $foo = $db->storeData($uname, $name, $post, $address, $ph, $dob, $hobbies, $skills, $languages, $summary, $history, $education);
                    if ($foo == 1) {
                        header("location:resume.php");
                    } else {
                        echo "Something went wrong";
                    }
                }
            } else {
                header("location:login.php");   
            }
        ?>
    </div>
</body>
</html>
