<div id="mheader">
<img src="iterfaceimage/wulogo.JPG" width="100%" height="120" alt="logo image">
</div>
<header>
<hgroup>
<div>
<ul id="nav">
<li><a href="RegisterarPage.php">Home</a></li>
<li><a href="#">Student Information</a>
<ul>
<li><a href="insertregister.php">Add Student Information</a></li>
<li><a href="regupdate.php">View Student Information</a></li>
<li><a href="viewreg.php">Search</a></li>
</ul>
</li>
<li><a href="accepted_payment.php">Accepted Payment(<?php
// include db
	include 'db.php';

// Perform query to count the rows in 'report' table
$result = mysqli_query($conn, "SELECT * FROM payments");

// Get number of rows returned
$numberOfRows = mysqli_num_rows($result); 

// If there are any rows, display the count
if ($numberOfRows > 0) {
echo '<font size="3" color="#FF0000" bgcolor="#003366">' . $numberOfRows . '</font>';
} else {
echo " ";
}
?>)</a>
<li><a href="approveserreq2.php">Approve Request (<?php
// include db
	include 'db.php';

// Perform query to count the rows in 'company' table
$result = mysqli_query($conn, "SELECT * FROM company");

// Get number of rows returned
$numberOfRows = mysqli_num_rows($result); 

// If there are any rows, display the count
if ($numberOfRows > 0) {
echo '<font size="3" color="#FF0000" bgcolor="#003366">' . $numberOfRows . '</font>';
} else {
echo " ";
}
?>)</a></li>
<li><a href="verifygraduateInfo.php">Verify Request</a></li>
<li><a href="sendmessearch.php">Generate Report</a></li>
<li><a href="change_password.php">Change Password</a></li>
<li><a href="logout.php"><img src="iterfaceimage/logout.PNG" height="20" width="24">&nbsp;&nbsp;Log out</a></li>
</ul>
</div>
</hgroup>
</header>
