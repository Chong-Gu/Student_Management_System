<?php
    include "database.php";
    session_start();
    if(!isset($_SESSION["TID"])){
        echo "<script>window.open('teacher_home.php?mes=AccessDenied', '_self');</script>";
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
        <title>teacher change password</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php include"navbar.php";?>
        <div id="section">
            <?php include "sidebar.php"; ?>  
            <div class="content">
                <h3 class="text">Welcome <?php echo $_SESSION["TNAME"]; ?> </h3><br><hr><br>
                <h3>Change password</h3>
                <div class="lbox1">
                    <?php
                        if(isset($_POST["submit"])){
                            $sql = "select * from staff where TPASS = '{$_POST["opass"]}' and TID = '{$_SESSION["TID"]}'";
                            $result = $db ->query($sql);
                            if($result->num_rows>0){
                                if($_POST["npass"] == $_POST["cpass"]){
                                    $sql = "update staff set TPASS='{$_POST["npass"]}' where TID='{$_SESSION["TID"]}'";
                                    $db->query($sql);
                                    echo "<div class='success'>password changed</div>";
                                }else{
                                    echo "<div class='error'>password mismatch</div>";
                                } 
                            }else{
                                echo "<div class='error'>Invalid password</div>";
                            }
                        }

                    ?>
                    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" >
                        <label>Old Password</label><br>
                        <input type="password" class="input3" name="opass"><br>
                        <label>New Password</label><br>
                        <input type="password" name="npass" class="input3"><br>
                        <label>Confirm Password</label><br>
                        <input type="password" name="cpass" class="input3"><br>
                        <button type="submit" name="submit" class="btn">Change password</button>
                    </form>
                </div>

            </div>
        </div>
    </body>
</html>