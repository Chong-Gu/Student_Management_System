<?php
    include "database.php";
    session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>View Exam</title>

    </head>
    <body>
        <div id="section">
            <?php include "sidebar.php"; ?> <br><br>
            <h3 class="text">Welcome <?php echo $_SESSION["ANAME"];?></h3><br><hr><br>

        </div>
        <div class="content">
            <h3> View Exam Time Table Details</h3><br>
            <?php 
                if(isset($_GET["mes"])){
                    echo "<div class='error'> {$_GET["mes"]} </div>";
                }
            ?>
            <table >
                <tr>
                    <th>S.No</th>
                    <th>Class</th>
                    <th>Subject</th>
                    <th>Exam Name</th>
                    <th>Term</th>
                    <th>Date</th>
                    <th>Session</th>
                    <th>Delete</th>
                </tr>
                <?php
                    $s = "select * from exam";
                    $res = $db->query($s);
                    if($res->num_rows>0){
                        $i= 0;
                        while($r=$res->fetch_assoc()){
                            $i++;
                            echo "
                            <tr>
                            <td>{$i}</td>
                            <td>{$r["CLASS"]}</td>
                            <td>{$r["SUB"]}</td>
                            <td>{$r["ENAME"]}</td>
                            <td>{$r["ETYPE"]}</td>
                            <td>{$r["EDATE"]}</td>
                            <td>{$r["SESSION"]}</td>
                            <td><a href='exam_delete.php?id={$r["EID"]}' class='btnr'>Delete</a></td>                    
                            </tr>   
                            ";
                        }
                    }else{
                        echo "NO record Found";
                    }
                        
                        


                ?>
            </table>
        </div>
    </body>
</html>