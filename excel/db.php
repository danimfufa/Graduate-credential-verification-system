<?php
// Create a connection using mysqli
$conn = mysqli_connect("localhost", "root", "", "wu_gcvs_db");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error($conn));
}
?>
