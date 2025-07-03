
<html>
<head>
<link href="good.css" rel="stylesheet" type="text/css" />
<link href="admin.css" rel="stylesheet" type="text/css" />
<title>Registrar page</title>
<style>
    .LeftApproveDiv{
          margin: 5px;
        padding: 5px;
        float: left;
        width: 900px;
        height: 700px;
        background-color: lavender;
        margin-left:100px;

}
.LeftApproveDiv table{
        margin: 5px;
        padding: 10px;
        width: 95%;
        background-color: white;
        border: 1px solid black;
        border-collapse: collapse;
        font-size: 14px;
}
form{
    font-size: 16px;
}
form table{
        margin: 5px;
        padding: 10px;
        width: 95%;
        background-color: white;
        border: 1px solid black;
        border-collapse: collapse;
        font-size: 14px;
}
.LeftApproveDiv table{
       margin: 5px;
        padding: 5px;
        width: 100%;
        background-color: white;
        border: 1px solid black;
        border-collapse: collapse;
        font-size: 14px;
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
<?php
include 'db.php';

// Fetch payments with status 'Accepted' or 'Approved'
$sql = "SELECT * FROM payments WHERE status = 'Accepted'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>User ID</th><th>Amount</th><th>Status</th><th>Created At</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['user_id'] . "</td>";
        echo "<td>" . $row['amount'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td>" . $row['approval_date'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();
?>

</div>



</body>
</html>
