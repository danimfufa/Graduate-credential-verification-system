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
				<div id="left">
<?php
		include "registerarLeft.php";
		?>
		</div>
<div id="space">
<div id="aform">
<?php
$con = mysqli_connect("localhost","root") or die(mysqli_error($con));
mysqli_select_db( $con, "gcvs_db_success") or die("Can not select Database");
$q = "select * from company";
$r=mysqli_query($con, $q);
?>
<h3>Search Graduate Information:</h3>
<form action="sendingemailstoexternal.php" method="post">
<table cellspacing="20" cellpadding="10"><br><br><br><br><br>
<tr><td><b><h2>Graduate ID:</h2></b></td><td>
<select name="Gid" id="span9001">
<?php
while($ro=mysqli_fetch_array($r))
{
$yu = "select * from request_approval";
$ss=mysqli_query($con, $yu);
while($roww=mysqli_fetch_array($ss))
{
if($roww['Employe_ID']==$ro['ID'])
{
if($roww['Approval']=="Disproved")
{
echo "<option>".$ro['Company_Email']."</option>";
}
}
}
$qew = "select * from info_verification";
$rr=mysqli_query($con, $qew);
while($row=mysqli_fetch_array($rr))
{
if($row['ID']==$ro['ID'])
{
if($row['Verification']=="Unverified")
{
echo "<option>".$ro['Company_Email']."</option>";
}
}
}

}
?>
</select></td></tr>
</table>
<button class="btn btn-primary" name="search">&nbsp;Search</button>
</div>
</form>
</div>
<?php
		include "yfoot.php";
		?>
</div>

</body>
