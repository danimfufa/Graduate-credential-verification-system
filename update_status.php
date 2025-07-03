<?php
    // Database connection
    include 'db.php';

    // Collect input
    $paymentId = $_POST['user_id'];
    $newStatus = $_POST['status'];

    // Update payment status in the database
    $stmt = $conn->prepare("UPDATE payments SET status = ? WHERE user_id = ?");
    $stmt->bind_param("ss", $newStatus, $paymentId);

    if ($stmt->execute()) {
        echo "<script>alert('Payment status updated successfully!');</script>";
    } else {
        echo "<script>alert('Failed to update payment status!');</script>";
    }

    $stmt->close();
    $conn->close();

?>

