<?php
include 'db_connect.php';

$booking_id = $_POST['booking_id'];
$status = $_POST['status'];
$payment_status = $_POST['payment_status'];

$sql = "UPDATE bookings SET status='$status', payment_status='$payment_status' WHERE booking_id=$booking_id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
