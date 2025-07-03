
<?php
session_start();
if(!isset($_SESSION['username']))
{ 
header('location:index.php');
}
else
{
	include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>External User Dashboard</title>
	<link href="good.css" rel="stylesheet" type="text/css" />
<link href="admin.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<style type="text/css">
	body{
		background-image: url('iterfaceimage/bg-image.JPG');
		background-color: lavender;
	}
</style>
</head>
<body>

	<?php include "external_user_header.php"; ?>
	<div id="leftsh">
<?php
include "external_user_left.php";
?>
</div>


</body>
</html>
<?php } ?>




