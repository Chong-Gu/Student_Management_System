<?php
    include "database.php";
    session_start();
    if(!isset($_SESSION["AID"])){
        echo "<script>window.open('index.php?mes=Access Denied..', '_self');</script>";
    }
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Main Page</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        <?php include "navbar.php"; ?>
        
        <div id="section">
            <?php include "sidebar.php"; ?>
            <div class="content">
            <h3 class="text"> Welcome <?php echo $_SESSION["ANAME"]; ?> </h3> <br><hr><br>
            <h3> School information </h3> <br>
            <!-- img src="img/home.jpg" class="imgs"-->

            <p class="para">
                School Management System is a complete software designed to automate school operation 
            </p>

            <p class="para">
                The school software has a powerful online comomunity to bring parents, teachers, and student
                on a common platform.
            </p>

            </div>



        </div>

    </body>
</html>


