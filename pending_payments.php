<?php
session_start();
if(!isset($_SESSION['username']))
{ 
header('location:index.php');
}
else
{
?>
<html>
<head>
<title> Finance Officer Dashboard</title>
<link href="good.css" rel="stylesheet" type="text/css" />
<link href="admin.css" rel="stylesheet" type="text/css" />
<style>
  .leftDiv{
        margin: 5px;
        padding: 5px;
        float: left;
        width: 900px;
        height: 700px;
        background-color: lavender;
        margin-left:100px;

    }
    .leftDiv table{
        margin: 5px;
        padding: 5px;
        width: 600px;
        background-color: white;
        border: 1px solid black;
        border-collapse: collapse;
        font-size: 14px;
      
    }
    button{
        
        background-color: blue;
        color: white;
        margin: 5px;
        padding: 5px;
        font-size: 14px;
        border: 0;
        border-radius: 5px;
    }
    button:hover{
        cursor: pointer;
    }
    select{
        color: white;
        background-color: green;
        margin: 5px;
        padding: 5px;
    }
  
</style>
</head>
<body >
<nav>
<div>
<?php include "finance_officer_header.php"; ?>
</div>
</nav>

<aside>
<div id="left">
<?php
include "finance_officer_left.php";
?>	
</div>
</aside>

<div class="leftDiv">
<?php
// Database connection
include 'db.php';

$result = $conn->query("SELECT * FROM payments");

if ($result->num_rows > 0) {
    echo "<form method='POST' action='update_status.php'>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>User ID</th><th>Amount</th><th>Status</th><th>View Receipt</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['user_id'] . "</td>";
        echo "<td>" . $row['amount'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td><a href='" . $row['receipt'] . "' target='_blank'>View</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</form>";
} else {
    echo "No payments found.";
}

$conn->close();
?>

</div>

</body>
</html>
<?php } ?>
