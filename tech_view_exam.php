<?php 
    include "database.php";
    session_start();
    if(!isset($_SESSION["TID"])){
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
	}	
	

?>

<!DOCTYPE html>
<html>
    <head>
        <title>tech view exam</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php include"navbar.php";?>
        <div id="section">
           <?php include "sidebar.php"; ?>
            <div class="content">
                <h3 class="text"> Welcome <?php echo $_SESSION["TNAME"]; ?></h3><br><hr><br>
                <h3>View Exam</h3><br>
                <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <div class="lbox1">
                        <label>Exam Date</label>
                        <select name="edate" class="input3" required>
                            <?php
                                $sl = "select * from exam";
                                $r = $db->query($sl);
                                if($r->num_rows>0){
                                    echo "<option value=''>Select</option>";
                                    while($ro=$r->fetch_assoc()){
                                        echo "<option value='{$ro["EDATE"]}'>{$ro["EDATE"]}</option>";  
                                    }
                                }
                            ?>
                        </select>

                    </div>
                    <div class="rbox">
                        <label>Class</label>
                        <select name="cla" class="input3 required">
                            <?php
                                $sl = "select DISTINCT(CNAME) from class";
                                $r = $db->query($sl);
                                if($r->num_rows>0){
                                    echo "<option value=''>Select</option>";
                                    while($ro= $r->fetch_assoc()){
                                        echo "<option value='{$ro["CNAME"]}'>{$ro["CNAME"]}</option>";

                                    }
                                }
                            ?>
                        </select><br><br>
                    </div>
                    <button type="submit" name="view" class="btn">View Details</button>
                </form><br>
                <div class="output">
                    <?php 
                        if(isset($_POST["view"])){
                            echo "<h3>Exam Time Table </h3><br>";
                            $sql = "select * from exam where EDATE='{$_POST["edate"]}' and CLASS='{$_POST["cla"]}'";
                            $re = $db->query($sql);
                            if($re->num_rows>0){
                                echo "
                                        <table>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Date</th>
                                                <th>Class</th>
                                                <th>Subject</th>
                                                <th>Exam Name</th>
                                                <th>Exam Type</th>
                                                <th>Session</th>
                                            </tr>
                                 ";
                                 $i = 0;
                                 while($r=$re->fetch_assoc()){
                                     $i++;
                                     echo "
                                        <tr>
                                            <td>{$i}</td>
                                            <td>{$r["EDATE"]}</td>
                                            <td>{$r["CLASS"]}</td>
                                            <td>{$r["SUB"]}</td>
                                            <td>{$r["ENAME"]}</td>
                                            <td>{$r["ETYPE"]}</td>
                                            <td>{$r["SESSION"]}</td>
                                        </tr>
                                     
                                     ";
                                 }
                            }else{
                                echo "No Record Found";
                            }
                            echo "</table>";
                        }

                    ?>
                </div>
            </div>
        </div>
    </body>
</html>