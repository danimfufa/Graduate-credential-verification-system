<?php
	$con=mysqli_connect("localhost","root","") or die(mysqli_error($con));
	mysqli_select_db($con, "gcvs_db_success") or die(mysqli_error($con));
?>