<html>
<head>
<title>Delete Company</title>
</head>
<body>
<?php
$Id=$_GET['ID'];
include 'db.php';
	$sql = "delete from company where company.ID='".$Id."'";
	mysqli_query ($conn, $sql);
	mysqli_close ($conn);
	echo '<script type="text/javascript">alert("Company Deleted Succesfully");window.location=\'admindeletecompany.php\';</script>';

?>
</body>
</html>