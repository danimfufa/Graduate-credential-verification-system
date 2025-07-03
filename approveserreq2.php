
<html>
<head>
<link href="good.css" rel="stylesheet" type="text/css" />
<link href="admin.css" rel="stylesheet" type="text/css" />
<title>Registrar page</title>
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
    font-size: 16px;
}
button{
    margin-left: 45%;
    margin-top: 10%;
}

</style>
</head>
<body >

<?php
include "registerarheader.php";
?>
<div id="leftsh">
<?php
include "registerarLeft.php";
?>
</div>


<div class="LeftApproveDiv">
<h3>Approve Service Request:</h3>
<form action="AproveServiceRequest.php" method="post">
<table cellspacing="20" cellpadding="10">
<tr>
<td><b><h2>Company Email:</b></h2></td>
<td>
<select name="cem" id="span9001">
<?php
include 'db.php';
// Query to fetch data from the company table
$q = "SELECT * FROM company";
$r = mysqli_query($conn, $q);
while ($ro = mysqli_fetch_array($r)) {
$yu = "SELECT * FROM request_approval";
$ss = mysqli_query($conn, $yu);
while ($roww = mysqli_fetch_array($ss)) {
if ($roww['Employe_ID'] == $ro['ID']) 
$yu = "good";
}
if ($yu != "good") {
echo "<option>".$ro['Company_Email']."</option>";
}
}
?>
</select>
</td>
</tr>
</table>
<button class="btn btn-primary" name="search">View</button>
</form>
</div>



</body>
</html>
