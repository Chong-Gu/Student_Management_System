<?php
    include "database.php";
    session_start();
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> School Management System</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body class="back">
        <?php include "navbar.php";?><br>
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
                    <i class="fa fa-user"></i>
                    <input type="text" name="aname" required class="input" placeholder="Username"><br><br>
                    <i class="fa fa-lock"></i>
                    <input type="password" name="apass" required class="input" placeholder="Password"><br>
                    <button type="submit" name="login" class="btn"> Login Here </button>
                </form>
            </div>
        </div>
        
    </body>
</html>