<?php
	include"database.php";
	session_start();
?>

<html>
    <head>
        <title>School Managment System - Tutor Joe's</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    
    <body class="back">
        
        <?php include"navbar.php";?>
        
        <img src="img/b1.jpg" width="800">
        
        <div class="login">
            <?php
                if(isset($_POST["login"]))
                {
                    $sql="select * from staff where TNAME='{$_POST["name"]}' and TPASS='{$_POST["pass"]}'";
                    $res = $db->query($sql);
                    if($res->num_rows>0)
                    {
                        $ro=$res->fetch_assoc();
                        $_SESSION["TID"]=$ro["TID"];
                        $_SESSION["TNAME"]=$ro["TNAME"];
                        echo "<script>window.open('teacher_home.php', '_self');</script>";
                    }
                    else
                    {
                        echo "<div class='error'>Invalid Username Or Password</div>";
                    }
                }
            ?>
            
            <h1 class="heading">Teacher's Login</h1>
            <div class="log">
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <label>User Name</label><br>
                    <input type="text" name="name" required class="input"><br><br>
                    <label>Password</label><br>
                    <input type="password" name="pass" required class="input"><br>
                    <button type="submit" class="btn" name="login">Login Here</button>
                </form>
            </div>
        </div>
        
        <div class="footer">
            <footer><p>Copyright &copy; Tutor Joe's</p></footer>
        </div>
    </body>
    
</html>