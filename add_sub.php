<?php
    include "database.php";
    session_start();
    if(!isset($_SESSION["AID"])){
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
	}		
?>
<!DOCTYPE html>

    <head>
        <title>Subject</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        <?php include"navbar.php";?>
        <div id="section">
            <?php include "sidebar.php" ?>
            
            <div class="content1">
            <h3 class="text">Welcome <?php echo $_SESSION["ANAME"] ?></h3> <br><hr><br>
                <h3>Add Subject Details</h3><br>
                <?php
                    if(isset($_POST["submit"])){
                        $sq = "insert into sub(SNAME) values ('{$_POST["sname"]}')";
                        if($db->query($sq)){
                            echo "<div class='success'>Insert Sucess</div>";
                        }else{
                            echo "<div class='error'>Insert Failed</div>";
                        }
                    }

                ?>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" >
                    <label>Subject Name</label><br>
                    <input type="text" name="sname" required class="input"><br>
                    <button type="submit" class="btn" name="submit"> Add Subject Details</button>
                </form>
        
            <div class="tbox">
                <h3>Subject Details</h3>
                <?php 
                    if(isset($_GET["mes"])){
                        echo "<div class='error'>{$_GET["mes"]} </div>";
                    }
                ?>

                <table >
                    <tr>
                        <th>S.NO</th>
                        <th>Subject Name </th>
                        <th>Delete</th>
                    </tr>
                    <?php
                        $s = "select * from sub ";
                        $res = $db->query($s);
                        if($res->num_rows>0){
                            $i = 0;
                            while($r = $res->fetch_assoc()){
                                $i++;
                                echo 
                                    "<tr>
                                        <td>{$i}</td>
                                        <td>{$r["SNAME"]} </td>
                                        <td><a href='sub_delete.php?id={$r["SID"]}' class='btnr'>Delete</a> </td>
                                    </tr>";
                            }
                        }

                    ?>
                </table>
            </div>
        </div>
        </div>
    </body>


</html>