<!DOCTYPE html>
<html>
    <head>
        <title>Resume</title>
        <link rel="stylesheet" href="assets/css/main.css">
    </head>
    <body>
        <div>
            <?php 
                session_start();
                require "mainclass.php";
                $db = new mainclass();
                $uname = $_SESSION['uname'];
                $foo = $db->showResume($uname);
                // var_dump($foo);
                foreach ($foo as $i) {
                    echo "Name - ".$i->name."<br>";
                    echo "Post - ".$i->post."<br>";
                    echo "Address - ".$i->address."<br>";
                    echo "ph - ".$i->ph."<br>";
                    echo "don - ".$i->dob."<br>";
                    echo "hobbies - ".$i->hobbies."<br>";
                    echo "Skills - ".$i->skills."<br>";
                    echo "Languages - ".$i->languages."<br>";
                    echo "Poof Summary - ".$i->professionalSummary."<br>";
                    echo "Employment History - ".$i->empHistory."<br>";
                    echo "Education Details - ".$i->educationalDetails."<br>"; 
                    break;   
                }
            ?>
            <a href="downloadResume.php">Download resume?</a>
        </div>
    </body>
</html>