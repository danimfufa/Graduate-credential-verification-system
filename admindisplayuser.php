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
        .display_user{
            margin: 10px;
            padding: 10px;
            width: 400px;
            height: 400px;
            float: left;
        }
        table{
            background-color: white;
            border: 1px solid black;
            width: 500px;
            border-collapse: collapse;

        }
         .StudentInfo{
            float: left;
            margin: 10px;
            padding: 10px;
            width:80%;
        }
        table{
            border: 1px solid black;
            padding: 5px;
            margin: 5px;
        }
        form table{
            background-color: white;
          
           
        
        }
        button{
            float: right;
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
<div class="StudentInfo">
<h3>Users Information:</h3>
<form action="adminrespdelproc.php" method="post">
<table border="1" cellspacing='0'>
    <tr>
        <th>Role</th>
        <th>Name</th>
        <th>Username</th>
        <th>Password</th>
        <th>Email</th>
        <th>Edit</th>
    </tr>

<?php
include 'db.php';
$id=$_GET['id'];
// Query to fetch all users
$q = "SELECT * FROM user";
$r = $conn->query($q);

// Check if the query was successful
if ($r) {
    while ($row = $r->fetch_assoc()) {
        $Id = $row['User_type'];
        $ln = $row['Name'];
        $cg = $row['username'];
        $q = $row['password'];
        $qe = $row['email'];
?>
<tr>
    <td><strong><?php echo $Id; ?></strong></td>
    <td><strong><?php echo $ln; ?></strong></td>
    <td><strong><?php echo $cg; ?></strong></td>
    <td><strong><?php echo $q; ?></strong></td>
    <td><strong><?php echo $qe; ?></strong></td>
    <td><strong>
        <a href="delete.php?id=<?php echo $id; ?>">
            <img src="iterfaceimage/delete-icon.jpg" width="100" height="35">Delete
        </a>
    </strong></td>
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
