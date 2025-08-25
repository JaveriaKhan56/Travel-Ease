<?php
include("db.php");

// Debug POST data
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

// Retrieve POST data
$user_id = $_POST['user_id'];
$package_id = $_POST['PackageID'];
$city_id = $_POST['city'];
if (empty($city_id)) {
    die('CityID is not set or is empty');
}
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$price = $_POST['totalPrice']; // Ensure this is correctly formatted
$tax = $_POST['tax'];
$memberDiscount = $_POST['memberDiscount']; 
$cardholder_name = $_POST['card_name'];
$card_number = $_POST['card_number'];

// Debugging: Check the retrieved values
// if (empty($price)) {
//     die('Price is not set or is empty');
// }
// echo "Price: " . htmlspecialchars($price) . "<br>";

// // Convert price to float if necessary
// $price = (float) $price;

// Insert into billing table
$sql = "INSERT INTO billing (user_id, CityID, PackageID, name, email, phone, totalPrice, tax, memberDiscount, address, card_name, card_number, payment_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Paid')";
$stmt = $conn->prepare($sql);

// Correct binding: 
// i - integer, 
// s - string, 
// d - double (for the price which is a floating-point number)
$stmt->bind_param("iiisssdddsss", $user_id, $city_id, $package_id, $name, $email, $phone, $price, $tax, $memberDiscount, $address, $cardholder_name, $card_number);

if ($stmt->execute()) {
    echo "<script>alert('Thank you! Your booking has been submitted.'); window.location.href = 'solopkgs.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
exit();
?>












<!-- 
// // // Insert into bookings table
// $sql = "INSERT INTO bookings (user_id, PackageID, number_ofPerson, booking_date, status, payment_status) VALUES (?, ?, ?, NOW(), 'Confirmed', 'Paid')";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("iii", $user_id, $package_id, $number_of_person);
// $stmt->execute(); -->