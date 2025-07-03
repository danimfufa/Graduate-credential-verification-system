<html>
<head>
<title>Manage Employee Information</title>
</head>
<body>
<?php
$Id=$_GET['ID'];
require 'db.php';
	$sql = "delete from employe where employe.ID='".$Id."'";
	mysqli_query ($conn, $sql);
	mysqli_close ($conn);
	echo '<script type="text/javascript">alert("Employe Deleted Succesfully");window.location=\'admindisplayemploye.php\';</script>';

?>
</body>
</html>