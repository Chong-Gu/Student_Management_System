<?php
    include "database.php";
    session_start();
    if(!isset($_SESSION["AID"])){
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
	}
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Add Staf</title> 
        <link rel="stylesheet" type="text/css" href="css/style.css">   
    </head>
    <body>
        <?php include"navbar.php";?>
        <div id="section">
            <?php include "sidebar.php" ?>
            
            <div class="content1">
                <h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?> </h3> <br><hr><br>
                <h3> ADD STAF DETAILS</h3><br>
                <?php
                    if(isset($_POST["submit"])){
                        $sq = "insert into staff(TNAME, TPASS, QUAL, SAL) values('{$_POST["sname"]}', 1234, '{$_POST["qual"]}', '{$_POST["sal"]}')";
                        if($db->query($sq)){
                            echo "<div class='success'>Insert Success</div>";
                        }else{
                            echo "<div class='error'>Insert Failed</div>";
                        }
                    }

                ?>
                <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" >
                    <label>Staff NAME</label><br>
                    <input type="text" name="sname" class="input" required>
                    <br><br>
                    <label>Qualification</label><br>
                    <input type="text" name="qual" class="input" required>
                    <br><br>
                    <label>Salary</label><br>
                    <input type="text" name="sal" class="input" required>
                    <br><br>
                    <button type="submit" class="btn" name="submit">Add Staff Details</button>
                </form>
            </div>
        </div>
    </body>
</html>