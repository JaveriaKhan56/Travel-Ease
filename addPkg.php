<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the database connection file
    include('db.php');
    
    // Retrieve form data
    $PackageName = $_POST['PackageName'];
    $PackageType = $_POST['PackageType'];
    $Details = $_POST['Details'];
    $Price = $_POST['Price'];
    $DurationDays = $_POST['DurationDays'];
    $cityID = $_POST['CityID'];
    $StartDate = $_POST['StartDate'];
    $EndDate = $_POST['EndDate']; // Corrected variable name
    
    // Image Ready
    $upload_dir = 'static/images/';
    $pkgImage = $_FILES['pkgImage']['name'];
    $target_file = $upload_dir . $pkgImage;
    $tmp_dir = $_FILES['pkgImage']['tmp_name'];
    
    // Check if the directory exists, if not create it
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    if (move_uploaded_file($tmp_dir, $target_file)) {
        // Requesting the insertion
        try {
            // Prepare the statement
            $stmt = $conn->prepare("INSERT INTO travel_packages (PackageName,  PackageType, Details, pkgImage, Price, DurationDays, StartDate, EndDate , CityID )  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            // Check for errors in statement preparation
            if (!$stmt) {
                throw new Exception("Error in statement preparation: " . mysqli_error($conn));
            }
            // Bind parameters
            $stmt->bind_param("ssssdsssi", $PackageName,  $PackageType, $Details, $pkgImage, $Price, $DurationDays, $StartDate, $EndDate, $cityID);
            // Execute the statement
            if (!$stmt->execute()) {
                throw new Exception("Error in statement execution: " . mysqli_error($conn));
            }
            echo "Package added successfully!";
               // Close the statement
        $stmt->close();
        } catch (Exception $e) {
            // Handle exceptions
            echo "Error: " . $e->getMessage();
        }
     
    } else {
        echo "Failed to upload the image.";
    }
    
    // Redirect to the main page
    header('Location: admin.php');
    exit();
}
?>