<?php

if (isset($_GET['id'])) {
    $orderId = $_GET['id'];

    include("db.php");

    // Fetch order details
    $selectQuery = "SELECT * FROM billing WHERE billing_id = ?";
    $selectStmt = $conn->prepare($selectQuery);

    if ($selectStmt === false) {
        die("Error in prepare statement: " . $conn->error);
    }

    $selectStmt->bind_param("i", $orderId);
    $selectStmt->execute();

    $result = $selectStmt->get_result();
    $row = $result->fetch_assoc();

    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $address = $row['address'];
    // $country = $row['country_name'];
    $cardHolder = $row['card_name'];
    $cardNumber = $row['card_number'];
    $total = $row['totalPrice'];
    $tax = $row['tax'];
    $status = $row['payment_status'];

    // $grandTotal = $total * (1 + $tax);
    // $bookname = $row['product_name'];
    
    // Perform the insertion into Bookings
    $insertQuery = "INSERT INTO Bookings (name, email, phone, address, card_name, card_number, totalPrice, tax, payment_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'Completed')";

    $insertStmt = $conn->prepare($insertQuery);

    if ($insertStmt === false) {
        die("Error in prepare statement: " . $conn->error);
    }

    $insertStmt->bind_param("sssssiii", $name, $email, $phone, $address, $cardHolder, $cardNumber, $total, $tax);

    $insertStmt->execute();

    if ($insertStmt->errno) {
        die("Error in execute: " . $insertStmt->error);
    }

    $insertStmt->close();

    // Perform the deletion from manageOrders
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

    $deleteStmt->close();

    header("Location: admin.php"); // Redirect to admin page after processing
} else {
    header("Location: admin.php");
}
?>
