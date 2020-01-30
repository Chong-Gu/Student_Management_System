<?php 
    include "database.php";
    session_start();
    if(!isset($_SESSION["TID"])){
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";	
	}	

?>

<!DOCTYPE html>
<html>
    <head>
        <title>View Students Teachers</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
    <body>
        <?php include"navbar.php";?>
        <div id="section">
           <?php include "sidebar.php"; ?>
            <div class="content">
                <h3 class="text">Welcome <?php echo $_SESSION["TNAME"]; ?></h3><br><hr><br>
                <h3>View Student Details</h3>
                <?php
                    if(isset($_GET["mes"])){
                        echo "<div class='error'>{$_GET["mes"]}</div>";
                    }

                ?>
                <table>
                    <tr>
                        <th>S.No</th>
                        <th>Roll No</th>
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Mail</th>
                        <th>Address</th>
                        <th>Class</th>
                        <th>Sec</th>
                        <th>Image</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                        $s = "select * from student where TID={$_SESSION["TID"]}";
                        $res = $db->query($s);
                        if($res->num_rows>0){
                            $i=0;
                            while($r=$res->fetch_assoc()){
                                $i++;
                                echo "
                                    <tr>
                                        <td>{$i}</td>
                                        <td>{$r["RNO"]}</td>
                                        <td>{$r["NAME"]}</td>
                                        <td>{$r["FNAME"]}</td>
                                        <td>{$r["DOB"]}</td>
                                        <td>{$r["GEN"]}</td>
                                        <td>{$r["PHO"]}</td>
                                        <td>{$r["MAIL"]}</td>
                                        <td>{$r["ADDR"]}</td>
                                        <td>{$r["SCLASS"]}</td>
                                        <td>{$r["SSEC"]}</td>
                                        <td><img src='{$r["SIMG"]}' alt='No Pic AVAILABLE' height='70' width='70'></td>
                                        <td><a href='stud_delete.php?id={$r["ID"]}' class='btnr'>Delete</a></td>
                                    </tr>
                                
                                ";
                            }
                        }else{
                            echo "No Record Found";
                        }

                    ?>
                </table>
            </div>
        </div>
    </body>
</html>