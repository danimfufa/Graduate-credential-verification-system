<?php
require 'db.php';

// Assume passwords are submitted via an array in POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["user"])) {
    if(isset($_POST['submit'])){
    foreach ($_POST["user"] as $user_id => $new_password) {
        $new_password=$_POST['npassword'];

        // Hash new password securely
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

        // Update password for each user
        $sql = "UPDATE user SET password = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $hashed_password, $user_id);
        $stmt->execute();
        $stmt->close();
    }
    echo "Passwords updated successfully!";
}

$conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Change Password</title>
</head>
<body>
    <form method="post">
        <input type="password" name="npassword" placeholder="Enter new password"><br><br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
