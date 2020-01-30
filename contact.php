<?php
    include "database.php";
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Contact</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body class="back">
        <?php include"navbar.php";?>
        <div class="login">
            <h1 class="heading">Contact US</h1>
            <div class="cont">
                <form method="POST" action="<?php echo $_SERVER["PHP_SEL"] ?>"> 
                    TUTOR JOE'S COMPUTER EDUCATION<br>
                    Vijaya Sree Towers, 1st Floor,<br>
                    Cherry Road, Opp Vincent Bus Stop,<br>
                    Kumarasamypatti, Salem-636 007<br>
                    Mail - tutorjoes@gmail.com<br>Phone - 90430-17689
                </form>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script>
        $(document).ready(function(){
            $(".error").fadeTo(1000, 100).slideUp(1000, function(){
                $(".errro").slideUp(1000);
            });
            $(".success").fadeTo(1000, 100).slideUp(1000, function(){
                $("success").slideUp(1000);
            });
        });
        </script>

    </body>
</html>