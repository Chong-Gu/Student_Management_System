<?php
    include "database.php";
    session_start();
    if(!isset($_SESSION["TID"])){
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
	}	

$sql = "SELECT * FROM staff where TID = {$_SESSION["TID"]}";
$res = $db->query($sql);
if($res->num_rows>0){
    $row = $res->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Teacher Main Page</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        <?php include"navbar.php";?>
        <div id="section">
            <?php include"sidebar.php";?>
        <div class="content">
            <h3 class="text">Welcome <?php echo $_SESSION["TNAME"]; ?> </h3><br><hr><br>

        <h3>Add Profile <h3><br>
        <div class="lbox1">
        <?php
            if(isset($_POST["submit"])){
                $target = "staff/";
                $target_file = $target.basename($_FILES["img"]["name"]);

                if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file)){
                    $sql = "update staff set PNO='{$_POST["pno"]}', MAIL='{$_POST["mail"]}', PADDR='{$_POST["addr"]}', IMG='{$target_file}' where TID={$_SESSION["TID"]}";
                    $db->query($sql);
                    echo "<div class='success'>Insert Success </div>";
                }
            }

        ?>
            <form enctype="multipart/form-data" role="form" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <label>Phone No</label><br>
                <input type="text" class="input3 name="pno" required><br>
                <label>Email</label><br>
                <input type="email" class="input3" name="mail" required><br>
                <label>Address</label><br>
                <textarea rows="5" name="addr"></textarea><br><br>
                <label>Image</label><br>
                <input type="file" class="input3" name="img" required><br>
                <button type="submit" class="btn" name="submit">Add Profile Details</button>
            </form>
        </div>

        <div class="rbox1">
            <h3>Profile</h3><br>
                <table>
                    <tr><td colspan="2"><img src="<?php echo $row["IMG"] ?>" height="100" width="100" alt="upload Pending"> </td></tr>
                    <tr><td>Name</td> <td><?php echo $row["TNAME"] ?></td></tr>
                    <tr><td>Qualification</td`><td><?php echo $row["QUAL"] ?> </td></tr>
                    <tr><td>Salary</td><td><?php echo $row["SAL"]?></td></tr>
                    <tr><td>Phone No </td><td> <?php echo $row["PNO"]?> </td>   </tr>
                    <tr><td>E - Mail </td> <td> <?php echo $row["MAIL"] ?> </td></tr>
                    <tr><td>Address </td> <td> <?php echo $row["PADDR"] ?> </td></tr>
                    
                </table>
        </div>
        </div>
        </div>
    </body>
</html>