<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied..','_self');</script>";
		
	}		
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tutor Joe's</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    
    <body>
        <?php include"navbar.php";?><br>
        
        <img src="img/1.jpg" style="margin-left:90px;" class="sha">
        
            <div id="section">
        
                <?php include"sidebar.php";?><br>
                
                <div class="content">
                    <h3 class="text">Welcom <?php echo $_SESSION["ANAME"]; ?></h3><br><br><br>
                        <h3>School Information</h3><br>
                    <img src="img/home.jpg" class="imgs">
                    <p class="para">
                        School Managment System
                    </p>
                    
                    <p class="para">
                        This school software has apowerful online community
                    </p>
                </div>
            </div>
    </body>
    
</html>