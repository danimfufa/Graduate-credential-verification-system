<html>
<head>
<title>Delete Student</title>
</head>
<body>
<?php
$Id=$_GET['ID'];
include 'db.php';
	$sql = "delete from student where student.ID='".$Id."'";
	mysqli_query ($conn, $sql);
	mysqli_close ($conn);
	echo '<script type="text/javascript">alert("Student Deleted Succesfully");window.location=\'adminUpdate.php\';</script>';

?>
</body>
</html>
