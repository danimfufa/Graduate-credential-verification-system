<?php
session_start();
if (!isset($_SESSION['username'])) { 
    header("location:index.php");
} else {
?>

<html>
<head>
<link href="good.css" rel="stylesheet" type="text/css" />
<link href="admin.css" rel="stylesheet" type="text/css" />
<title>Registrar Page</title>
<style>

    .leftupdateuser{
        margin: 10px;
        padding: 10px;
        float: left;
        width: 500px;
        height: 500px;
    }
    table{
        background-color: white;
        border: 1px solid black;
        margin: 5px;
        padding: 5px;
        border-collapse: collapse;
    }
</style>
</head>
<body >
<?php include "adminheader.php"; ?>
<?php include "adminleft.php"; ?>


<div class="leftupdateuser">
<h3 align='center'><font color='black'> size='5'>Company Information:</font></h3>
<form action="adminrespdelproc.php" method="post">
<table border="1" cellspacing="0"><tr><td>
<tr><th>ID:</th><th>Comp_Phone</th><th>Comp_Name</th><th>Comp_Email</th><th>Comp_country</th><th>Comp_City</th><th>Date</th><th>Reason</th><th>Delete</th></tr>

<?php
// Database connection
include 'db.php';

// SQL query to fetch data from 'company' table
$q = "SELECT * FROM company";
$r = mysqli_query($conn, $q);

// Loop through the results and display them
while ($row = mysqli_fetch_array($r)) {
    $Id = $row['ID'];
    $fn = $row['Company_Phone'];
    $mn = $row['Company_Name'];
    $ln = $row['Company_Email'];
    $cg = $row['Company_country'];
    $yog = $row['Company_City'];
    $q = $row['Date'];
    $g = $row['Reason_of_Verification'];
?>
<tr>
    <td><strong><?php echo $Id; ?></strong></td>
    <td><strong><?php echo $fn; ?></strong></td>
    <td><strong><?php echo $mn; ?></strong></td>
    <td><strong><?php echo $ln; ?></strong></td>
    <td><strong><?php echo $cg; ?></strong></td>
    <td><strong><?php echo $yog; ?></strong></td>
    <td><strong><?php echo $q; ?></strong></td>
    <td><strong><?php echo $g; ?></strong></td>
    <td><strong><a href="admindeletecompanypro.php?ID=<?php echo $Id; ?>" onclick="return confirm('Are you want to permanently delete this data?')"><img src="iterfaceimage/delete-icon.jpg" width="30" height="30"/></a></strong></td>
</tr>
<?php
}
?>
</table>

</form>
</div>





</body>
</html>

<?php
}
?>
