<html>
<head>
    <title>WU GCVS</title>
</head>
<body>
<?php 
$gid = $_GET['ID'];
$gfname = $_POST['Gfname'];
$gmname = $_POST['Gmname'];
$glname = $_POST['Glname'];
$yog = $_POST['Gpa'];

// Create a connection to MySQL using mysqli
$con = mysqli_connect("localhost", "root", "", "gcvs_db_success");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to update the user
$sql = "UPDATE user SET Name = ?, username = ?, Password = ?, email = ? WHERE user.User_type = ?";

// Prepare and bind the statement
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, 'sssss', $gfname, $gmname, $glname, $yog, $gid);

// Execute the statement
if (mysqli_stmt_execute($stmt)) {
    echo '<script type="text/javascript">alert("User Updated Successfully"); window.location=\'admindisplayuser.php\';</script>';
} else {
    die('Error: ' . mysqli_error($con));
}

// Close the prepared statement and connection
mysqli_stmt_close($stmt);
mysqli_close($con);
?>
</body>
</html>
