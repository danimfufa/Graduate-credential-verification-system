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

        .StudentInfo{
            float: left;
            margin: 10px;
            padding: 10px;
            width:80%;
        }
        table{
            border: 1px solid black;
            border-collapse: collapse;
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
<form action="delete.php" method="post">
<table border="1" cellspacing='0'>
    <tr>
        <th>Role</th>
        <th>Full Name</th>
        <th>Username</th>
        <th>Password</th>
        <th>Email</th>
        <th>Delete</th>
    </tr>

<?php
include 'db.php';

// Query to fetch all users
$q = "SELECT * FROM user";
$r = $conn->query($q);

// Check if the query was successful
if ($r) {
    while ($row = $r->fetch_assoc()) {
        $id=$row['id'];
        $ln = $row['Name'];
        $cg = $row['username'];
        $q = $row['password'];
        $qe = $row['email'];
        $role = $row['User_type'];

?>
<tr>
    <td><strong><?php echo $role; ?></strong></td>
    <td><strong><?php echo $ln; ?></strong></td>
    <td><strong><?php echo $cg; ?></strong></td>
    <td><strong><?php echo $q; ?></strong></td>
    <td><strong><?php echo $qe; ?></strong></td>
    <td><strong>
        <button><a href="delete.php?id=<?php echo $id; ?>">
            <img src="iterfaceimage/delete-icon.jpg" width="100" height="35"/>Delete
        </a></button>
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
