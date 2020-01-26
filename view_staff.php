<?php
    include "database.php";
    session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Staff INFO</title>
        
    </head>
    <body>
        
        <div id="section">
            <?php include "sidebar.php" ?>
			<br><br><br>
            <h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?> </h3> <br><hr><br>
            <div class="content1"> 
                <h3> View Staff Details</h3>
                <form id="frm" autocomplete="off">
                    <input type="text" id="txt" class="input">
                </form>
                <br>
                <div id="box">

                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script>
           $(document).ready(function() {
               $("#txt").keyup(function() {
                    var txt = $("#txt").val();
                    if(txt != ""){
                        $.post("search.php",{s:txt}, function(data){
                            $("#box").html(data);
                        });
                    }
               });
           });
        </script>

    </body>
</html>