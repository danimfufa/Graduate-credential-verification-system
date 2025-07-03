<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection
    include 'db.php';

    // Collect input
    $paymentId = $_POST['payment_id'];
    $newStatus = $_POST['status'];

    // Update payment status in the database
    $stmt = $conn->prepare("UPDATE payments SET status = ? WHERE user_id = ?");
    $stmt->bind_param("si", $newStatus, $paymentId);

    if ($stmt->execute()) {
        echo "<script>alert('Payment approved successfully!');</script>";
    } else {
         echo "<script>alert('Failed to approve payment!');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
