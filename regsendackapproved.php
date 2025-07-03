<html>
<head>
<link href="good.css" rel="stylesheet" type="text/css" />
<link href="admin.css" rel="stylesheet" type="text/css" />
<title>
Registerar page
</title>
</head>
<body id="contianer">
<div id="bod">
<?php
		include "registerarheader.php";
		?>
<div id="space">
<div id="aform">
<?php
$con = mysqli_connect("localhost","root") or die(mysqli_error($con));
mysqli_select_db($con, "gcvs_db_success") or die("Can not select Database");
$q = "select * from student";
$r=mysqli_query($con, $q);
?>
<h3>Send Acknowledgement Message Form:</h3>
<form action="" method="post">
<table cellspacing="20" cellpadding="10"><br><br><br><br><br>
<tr><td><b>ID:</b></td><td>
<select name="id">
<?php
while($row=mysqli_fetch_array($r))
{
$qe = "select * from info_verification";
$rw=mysqli_query($con, $qe);
while($ror=mysqli_fetch_array($rw))
{
if($ror['ID']==$row['ID'])
{
if($ror['Verification']=="Verified")
{
echo "<option>".$row['ID']."</option>";
}
}
}
}
?>
</select></td></tr>
</table>
<input type="submit" name="search" value="Search">
</div>
</form>
</div>
<?php
		include "yfoot.php";
		?>
</div>

</body>
