<?php
    include "database.php";
    session_start();
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> School Management System</title>
    </head>

    <body>
        <?php include "navbar.php";?>
        
        <div class="login">
            <h1 class="heading">Admin Login</h1>
            <div class="log">

                <?php 
                    if(isset($_POST["login"])){
                        $sql="select * from admin where aname='{$_POST["aname"]}' and APASS='{$_POST["apass"]}'";
                        $res= $db->query($sql);
                        if($res->num_rows>0){
                            $ro=$res->fetch_assoc();
                            $_SESSION["AID"]=$ro["AID"];
                            $_SESSION["ANAME"]=$ro["ANAME"];
                            echo "<script>window.open('admin_home.php', '_self');</script>";
                        }else{
                            echo "<div class='error'>Invalid Username or Password</div>";
                        }

                    }
                    if(isset($_GET["mes"])){
                        echo "<div class='error'> {$_GET["mes"]} </div>";
                    }
                ?>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                    <label>User Name </label><br>
                    <input type="text" name="aname" required class="input"><br><br>
                    <label>Password </label><br>
                    <input type="password" name="apass" required class="input"><br>
                    <button type="submit" name="login" class="btn"> Login Here </button>
                </form>
            </div>
        </div>
    </body>
</html>