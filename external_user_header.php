<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>External User Header</title>
	<link rel="stylesheet" type="text/css" href="good.css">
</head>
<body>

<div id="mheader">
<img src="iterfaceimage/wulogo.JPG" width="100%" height="120" alt="logo image">
</div>

<header>
<hgroup>
<div>
<ul id="nav">
<li><a href="external_userdashboard.php">Dashboard</a></li>
<li><a href="rf.php">Register Company Information<br></li></a>
<li><a href="employeform.php">Register Employee Information<br></li></a>
<li><a href="apply_payment.php">Apply Payment</a></li>
<li><a href="responsepage.php">View Response (<?php
// include db
	include 'db.php';

// Perform query to count the rows in 'report' table
$result = mysqli_query($conn, "SELECT * FROM report");

// Get number of rows returned
$numberOfRows = mysqli_num_rows($result); 

// If there are any rows, display the count
if ($numberOfRows > 0) {
echo '<font size="3" color="#FF0000" bgcolor="#003366">' . $numberOfRows . '</font>';
} else {
echo " ";
}
?>)</a></li>
<li><a href="change_password.php">Change Password</a></li>
<li><a href="logout.php"><img src="iterfaceimage/logout.PNG" height="20" width="24">&nbsp;&nbsp;Log out</a></li>
</ul>
</div>
 </hgroup>
</header>   

</body>
</html>