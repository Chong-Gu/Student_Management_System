<?php
    include "database.php";
    session_start();
    
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Add Staf</title>    
    </head>
    <body>
        <div id="section">
            <?php include "sidebar.php" ?>
            <h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?> </h3> <br><hr><br>
            <div class="content1">
                <h3> ADD STAF DETAILS</h3>
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
                    <label>Staff NAME</label>
                    <input type="text" name="sname" class="input" required>
                    <br><br>
                    <label>Qualification</label>
                    <input type="text" name="qual" class="input" required>
                    <br><br>
                    <label>Salary</label>
                    <input type="text" name="sal" class="input" required>
                    <br><br>
                    <button type="submit" class="btn" name="submit">Add Staff Details</button>
                </form>
            </div>
        </div>
    </body>
</html>