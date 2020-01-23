<?php
	$servername = "localhost";
	$username = "root";
	$password = "password";
	$dbname = "school";
	$db = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    if(!$db){
        echo "failed";
    }
?>
