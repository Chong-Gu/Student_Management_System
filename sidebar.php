<div class ="sidebar">
<h3 class="dash"> Dashboard</h3>
<?php
    if(isset($_SESSION["AID"])){
        echo '
            <ul class="s">
                <li class="li"><a href="admin_home.php">School</a></li>
                <li class="li"><a href="add_class.php">Class</a></li>
                <li class="li"><a href="add_sub.php"> Subject</a></li>
                <li class="li"><a href="add_staff.php">Staff</a></li>
                <li class="li"><a href="view_staff.php">View Staff</a></li>
                <li class="li"><a href="set_exam.php">Set Exam</a></li>
                <li class="li"><a href="view_exam.php">View Exam</a></li>
                <li class="li"><a href="student.php" target="_blank"> View Student </a></li>
                <li class="li"><a href="logout.php">Logout </a></li>
            </ul>            
            ';
    }else{
        echo '
            <ul class="s">
                <li class="li"><a href="teacher_home.php">Profile</a></li>
                <li class="li"><a href="handle_class.php">Handle Class</a></li>
                <li class="li"><a href="add_stud.php">Students</a></li>
                <li class="li"><a href="view_stud_teach.php" target="_blank">View Student</a></li>
                <li class="li"><a href="tech_view_exam.php">View Exam</a></li>
                <li class="li"><a href="add_mark.php">Add Mark</a></li>
                <li class="li"><a href="view_mark.php">View Marks</a></li>
                <li class="li"><a href="logout.php">Logout</a></li>
            </ul>
            ';
    }
    

?>
</div>
