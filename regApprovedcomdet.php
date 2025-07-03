<html>
<head>
<title>WU GCVS</title>
</head>
<body>
<?php 
session_start();
$eid = $_GET['ID'];
$rer = $_POST['rer'];
$ra = $_POST['regA'];

// Check if the approval option is selected
if ($ra == "--select one--") {
    echo '<script type="text/javascript">alert("Please select approval option");window.location=\'approveserreq2.php\';</script>';
    exit();
} else {
    // Establish the database connection using mysqli
   include 'db.php';

    // Prepare the SQL query
    $sql = "INSERT INTO request_approval (Employe_ID, Registerar_Remark, Approval) VALUES ('$eid', '$rer', '$ra')";

    // Execute the query
    if (!mysqli_query($conn, $sql)) {
        die('Error: ' . mysqli_error($con));
    }

    // Success message and redirection
    echo '<script type="text/javascript">alert("Request Approved Successfully!");window.location=\'approveserreq2.php\';</script>';

    // Close the connection
    mysqli_close($conn);
}
?>
</body>
</html>
