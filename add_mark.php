<?php
    include "database.php";
    session_start();
    if(!isset($_SESSION["TID"])){
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";	
	}	

    $sql = "select * from staff where TID={$_SESSION["TID"]}";
    $res = $db->query($sql);

    if($res->num_rows>0){
        $row = $res->fetch_assoc();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Mark</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php include"navbar.php";?>
        <div id="section">
            <?php include "sidebar.php"; ?>
            <div class="content">
            <h3 class="text">Welcome <?php echo $_SESSION["TNAME"]; ?> </h3><br><hr><br>
                <h3>Add Marks</h3><br>
                <?php

                    if(isset($_GET["err"])){
                        echo "<div class='error'>{$_GET["err"]}</div>";
                    }
                ?>
                <form method="GET" action="mark.php">
                    <div classs="lbox1">
                        <label>Enter Roll No</label><br>
                        <input type="text" class="input3" name="rno"><br><br>
                    </div>
                    <button type="submit" class="btn" name="view">View Details</button>
                </form>
            </div>
        </div>
    </body>
    
</html>
