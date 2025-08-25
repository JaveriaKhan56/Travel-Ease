<?php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if PackageID is set and assign it
    if (!isset($_POST['PackageID'])) {
        echo "Travel Package ID is not set.";
        exit();
    } else {
        $PackageID = $_POST['PackageID'];
    }

    // Retrieve form data
    $PackageName = $_POST['PackageName'];
    $PackageType = $_POST['PackageType'];
    $Details = $_POST['Details'];
    $Price = $_POST['Price'];
    $DurationDays = $_POST['DurationDays'];
    $StartDate = $_POST['StartDate'];
    $EndDate = $_POST['EndDate'];

    // File upload details
    $allowedExtensions = ['png', 'jpg', 'jpeg', 'webp'];
    $upload_dir = 'static/images/';
    $pkgImage = $_FILES['pkgImage']['name'];
    $target_file = $upload_dir . basename($pkgImage);
    $tmp_dir = $_FILES['pkgImage']['tmp_name'];

    // Check file extension
    $fileExtension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (!in_array($fileExtension, $allowedExtensions)) {
        echo "Invalid file extension.";
        exit();
    }

    // Move uploaded file
    if (!move_uploaded_file($tmp_dir, $target_file)) {
        echo "File upload failed.";
        exit();
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("UPDATE travel_packages SET PackageName=?, PackageType=?, Details=?, Price=?, DurationDays=?, StartDate=?, EndDate=?, pkgImage=? WHERE PackageID=?");

    // Bind parameters
    $stmt->bind_param("ssssssssi", $PackageName, $PackageType, $Details, $Price, $DurationDays, $StartDate, $EndDate, $pkgImage, $PackageID);

    // Execute the query
    $stmt->execute();

    // Check for errors
    if ($stmt->error) {
        echo "Error: " . $stmt->error;
        exit();
    }

    // Check affected rows and redirect
    if ($stmt->affected_rows > 0) {
        echo "Updated Successfully";
        header("Location: admin.php");
        exit();
    } else {
        echo "Update failed.";
    }

    $stmt->close();
    $conn->close();
}
?>
