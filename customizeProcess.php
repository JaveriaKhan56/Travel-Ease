<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $packageName = $_POST['packageName'];
    $details = $_POST['details'];
    $price = $_POST['price'];
    $duration = $_POST['duration'];
    $numOfPeople = $_POST['numOfPeople'];
    $startDate = $_POST['StartDate'];
    $endDate = $_POST['EndDate'];
    $userId = 1; // Ensure this userId is valid or replace with a dynamic value

    // Use parameterized queries to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO travel_custompackages (UserID, PackageName, Details, Price, No_Of_Person, DurationDays, StartDate, EndDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issdisss", $userId, $packageName, $details, $price, $numOfPeople, $duration, $startDate, $endDate);

    if ($stmt->execute()) {
        echo "<script>alert('Thank you! Your booking has been submitted.'); window.location.href = 'customizePackages.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>