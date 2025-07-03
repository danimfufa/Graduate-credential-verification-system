<html>
<head>
<title>Delete Student</title>
</head>
<body>
<?php
$Id=$_GET['ID'];
// db connection
include 'db.php';

	$sql = "delete from student where student.ID='".$Id."'";
	mysqli_query ($conn, $sql);
	mysqli_close ($conn);
	echo '<script type="text/javascript">alert("Student File Deleted Succesfully");window.location=\'regupdate.php\';</script>';

?>
</body>
</html>