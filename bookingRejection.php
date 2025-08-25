<?php

if (isset($_GET['id'])) {
    $orderId = $_GET['id'];

    include("db.php");
    
    // Perform the deletion
    $deleteQuery = "DELETE FROM billing WHERE billing_id = ?";
    $deleteStmt = $conn->prepare($deleteQuery);

    if ($deleteStmt === false) {
        die("Error in prepare statement: " . $conn->error);
    }

    $deleteStmt->bind_param("i", $orderId);
    $deleteStmt->execute();

    if ($deleteStmt->errno) {
        die("Error in execute: " . $deleteStmt->error);
    }
    // Show alert and redirect to admin.php
    echo "<script>alert('The booking package has been removed successfully.'); window.location.href = 'admin.php?option=PendingBookings';</script>";
    $deleteStmt->close();


} else {
    header("Location: admin.php");
}
?>
