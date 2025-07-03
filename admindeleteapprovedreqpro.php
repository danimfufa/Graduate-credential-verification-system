<html>
<head>
<title>Delete Approved Request</title>
</head>
<body>
<?php
$Id=$_GET['ID'];
$con = mysqli_connect("localhost","root", "") or die(mysqli_error($con));
mysqli_select_db($con, "gcvs_db_success") or die("Can not select Database");
	$sql = "delete from request_approval where request_approval.Employe_ID='".$Id."'";
	mysqli_query ($con, $sql);
	$sql3 = "delete from company where company.ID='".$Id."'";
	mysqli_query ($con, $sql);
			$sql4 = "delete from employe where employe.ID='".$Id."'";
	mysqli_query ($con, $sql4);
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Request approval Deleted Succesfully");window.location=\'admindeleteapprovedreq.php\';</script>';

?>
</body>
</html>