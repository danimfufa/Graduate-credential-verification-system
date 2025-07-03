<?php
session_start();
if (!isset($_SESSION['username'])) {
header("location:index.php");
} else {
include 'db.php';
?>
<html>
<head>
<link href="good.css" rel="stylesheet" type="text/css" />
<link href="admin.css" rel="stylesheet" type="text/css" />
<title>Registerar page</title>
<style>
    .LeftApproveDiv{
        float: left;
    width: 600px;
    height: 300px;
    margin: 10px;
    padding: 10px;
    margin-left: 100px;
    background-color: lightgrey;
    border-radius: 10px;
    font-size: 16px;
}
form{
    font-size: 16px;
}
form table{
    text-align: center;
    font-size: 16px;
}
button{
    margin-left: 37%;
    margin-top: 10%;
}
</style>
</head>
<body >

<?php include "registerarheader.php"; ?>
<div id="leftsh">
<?php include "registerarLeft.php"; ?>
</div>

<?php
include 'db.php';
// Query to fetch data from the company table
$q = "SELECT * FROM company";
$r = mysqli_query($conn, $q);

?>
<div class="LeftApproveDiv">
<h3 align='center'>Generate Report</h3>
<form action="sendingemailstoexternal.php" method="post">
<table cellspacing="20" cellpadding="10"><br><br>
<tr>
<td><b><h2>Student ID:</h2></b></td>
<td>
<select name="Gid" id="span9001">
<?php
while ($ro = mysqli_fetch_array($r)) {
// Query to fetch verification status
$qew = "SELECT * FROM info_verification";
$rr = mysqli_query($conn, $qew);
while ($row = mysqli_fetch_array($rr)) {
if ($row['ID'] == $ro['ID']) {
if ($row['Verification'] == "Verified") {
// Query to fetch student information
$qstud = "SELECT * FROM student";
$stud = mysqli_query($conn, $qstud);
while ($rstud = mysqli_fetch_array($stud)) {
if ($row['ID'] == $rstud['ID']) {
// Query to check if report exists
$yu = "SELECT * FROM report";
$ss = mysqli_query($conn, $yu);
$found = false;
while ($roww = mysqli_fetch_array($ss)) {
if ($roww['ID'] == $rstud['ID']) {
$found = true;
break;
}
}
// If no report exists, show the option
if (!$found) {
echo "<option>" . $rstud['ID'] . "</option>";
}
}
}
}
}
}
}
?>
</select>
</td>
</tr>
</table>
<button class="btn btn-primary" name="search">Generate Report</button>
</form>
</div>
</body>
</html>
<?php
}
?>
