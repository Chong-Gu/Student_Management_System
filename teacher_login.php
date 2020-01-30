<?php
    include "database.php";
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Teacher</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
    </head>
    <body>
    <?php include"navbar.php";?><br>
        <div class="login">
            <h1 class="heading">Teacher Login</h1>
            <div class="log">
                <?php
                if(isset($_POST["login"])){
                    $sql = "select * from staff where TNAME = '{$_POST["name"]}' and TPASS='{$_POST["pass"]}'";
                    $res = $db->query($sql);
                    if($res->num_rows>0){
                        $ro = $res->fetch_assoc();
                        $_SESSION["TID"]=$ro["TID"];
                        $_SESSION["TNAME"] = $ro["TNAME"];
                        echo "<script>window.open('teacher_home.php','_self');</script>";
                    }else{
                        echo "<div class='error'>Invalid Username Or Password</div>";
                    }
                }
                   
                ?>
                <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" class="input" placeholder="Username" required> <br><br>
                    <i class="fas fa-lock"></i>
                    <input type="password" name="pass" class="input" placeholder="Password" required><br>
                    <button type="submit" name="login" class="btn" >Login Here</button>
                </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){
                $(".error").fadeTo(1000, 100).slideIp(1000, function(){
                    $(".error").slideUp(1000);
                });

                $(".success").fadeTo(1000, 100).slideUp(1000, function(){
                    $(".success").slideUp(1000);
                });
            });
        </script>
    </body>
</html>