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
<title>Admin Page</title>
<style>
    .approvereq{
        margin: 10px;
        padding: 10px;
        float: left;
        margin-left: 40px;
    }
    table{
        background-color: white;
        margin: 5px;
        padding: 5px;
        border: 1px solid black;
        width: 500px;
    }
</style>
</head>
<body >

<?php
include "adminheader.php";
?>

<?php
include "adminleft.php";
?>


<div class="approvereq">
<h3 align='center'><font size='5' color='black'>Approved Request:</font></h3>
<form action="adminrespdelproc.php" method="post">
<table border="1" cellspacing="0"><tr><td>
<tr >
<th>Employe_ID</th>
<th>Registerar_Remark</th>
<th>Approval</th>
<th>Delete</th>
</tr>

<?php
// Establish database connection using mysqli
include 'db.php';

// SQL query to fetch data from 'request_approval' table
$q = "SELECT * FROM request_approval";
$r = mysqli_query($conn, $q);

// Fetching and displaying the data
while ($row = mysqli_fetch_array($r)) {
    $Id = $row['Employe_ID'];
    $cg = $row['Registerar_Remark'];
    $q = $row['Approval'];
?>
<tr>
    <td><strong><?php echo $Id; ?></strong></td>
    <td><strong><?php echo $cg; ?></strong></td>
    <td><strong><?php echo $q; ?></strong></td>
    <td><strong><a href="admindeleteapprovedreqpro.php?
    ID=<?php echo $Id; ?>" onclick="return confirm('Are you sure you want to delete this data?')">
    <img src="iterfaceimage/delete-icon.jpg" width="30" height="30"/></a></strong></td>
</tr>
<?php
}
?>
</table>
</form></div>




</body>
</html>

<?php
}
?>
