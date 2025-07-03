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
    <title>Administrator Page</title>
    <style>
          .approvereq{
        margin: 10px;
        padding: 10px;
        float: left;
        margin-left: 40px;
    }
    table{
        background-color: white;
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


<div  class="approvereq">
<h3 align='center'><font color='black'>User Feedback</font></h3>
<form action="adminUpdatepro.php" method="post">
<table border="1" cellspacing="0"><tr><td>
<tr >
    <th>Email</th>
    <th>Message</th>
</tr>

<?php
// Establish a connection to the database using mysqli
include 'db.php';

// Query to select all records from the 'info_verification' table
$q = "SELECT * FROM feedback";
$r = $conn->query($q);

// Check if query was successful
if ($r) {
    while ($row = $r->fetch_assoc()) {
        $Id = $row['email'];
        $fn = $row['message'];
?>
<tr>
    <td><strong><?php echo $Id; ?></strong></td>
    <td><strong><?php echo $fn; ?></strong></td>
</tr>
<?php
    }
} else {
    echo "Error: " . $conn->error;
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
