<html>
<head>
    <title>WU GCVS</title>
</head>
<body>
<?php 
$so = $_POST['selectop'];
$uac = $_POST['uaccount'];
$up = $_POST['pass'];
$nua = $_POST['nuaccount'];
$np = $_POST['npass'];
$cnp = $_POST['ncpass'];

if ($np != $cnp) {
    echo '<script type="text/javascript">alert("The password is not confirmed!");window.location=\'UserAccount.php\';</script>';
    exit();
} else {
    // Create a connection using mysqli
    $con = new mysqli("localhost", "root", "", "gcvs_db_success");

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Prepare a query to select the user based on the 'User_type'
    $sq = "SELECT * FROM user WHERE User_type=?";
    $stmt = $con->prepare($sq);
    $stmt->bind_param("s", $so);  // 's' means the parameter is a string
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($row = $result->fetch_assoc()) {
        // Check if the entered username and password match
        if (($uac === $row['username']) && ($up == $row['password']) && ($np == $cnp)) {
            // Prepare the update query
            $sql = "UPDATE user SET username=?, password=? WHERE User_type=?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("sss", $nua, $np, $so);  // 's' means the parameter is a string
            if ($stmt->execute()) {
                echo '<script type="text/javascript">alert("User Name and password changed successfully!");window.location=\'UserAccount.php\';</script>';
            } else {
                die('Error: ' . $stmt->error);
            }
        } else {
            echo '<script type="text/javascript">alert("Invalid username or password!");window.location=\'UserAccount.php\';</script>';
        }
    } else {
        echo '<script type="text/javascript">alert("User not found!");window.location=\'UserAccount.php\';</script>';
    }

    // Close the connection
    $stmt->close();
    $con->close();
}
?>
</body>
</html>
