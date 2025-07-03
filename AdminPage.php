<?php
session_start();
if(!isset($_SESSION['username']))
{ 
header("location:index.php");
}
else
{
	include 'db.php';
?>
<html>
<head>
<link href="good.css" rel="stylesheet" type="text/css" />
<link href="admin.css" rel="stylesheet" type="text/css" />
<title>
Adminstrator page
</title>
<style type="text/css">
body{
	background-image: url(iterfaceimage/administrator.jpg);
}
</style>
</head>
<body>
<?php
include "adminheader.php";
?>
<div id="leftsh">
<?php
include "adminleft.php";
?>
</div>




</body>
</html>
<?php
}
?>