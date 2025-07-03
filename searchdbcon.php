<?php
// Using MySQLi with Object-Oriented approach
$con = new mysqli("localhost", "root", "", "gcvs_db_success");

// Check the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


?>
