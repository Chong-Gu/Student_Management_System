<?php
    include "database.php";
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>change password</title>
        
    </head>
    <body>
        <div id="section">
            <h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><hr>
            <?php
            if(isset($_POST["submit"])){
                $sql = "select * from admin where APASS='{$_POST["opass"]}' and AID='{$_SESSION["AID"]}'";
                $result = $db->query($sql);
                if($result->num_rows>0){
                    if($_POST["npass"] == $_POST["cpass"]){
                        $s = "update admin set APASS='{$_POST["npass"]}' where AID='{$_SESSION["AID"]}'";
                        $db->query($s);
                        echo "<div class='success'>Password Changed</div>";
                    }else{
                        echo "<div class='error'>Password Mismatched</div>";
                    }
                }else{
                    echo "<div class='error'>Invalid Old Password</div>";
                }
            }
            ?>
        </div>
        <div class="content1">
            <h3>Change Password</h3><br>

            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <label>Old Password</label><br>
                <input type="text" class="input3" name="opass"><br>
                <label>New Password</label><br>
                <input type="text" class="input3" name="npass"><br>
                <label>Confirm Password</label>
                <input type="text" class="input3" name="cpass"><br>
                <button type="submit" class="btn" name="submit">Change Password</button>
            </form>
        </div>
    </body>
</html>