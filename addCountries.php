Copy code
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the database connection file
    include('db.php');
    
    // Retrieve form data
    $countryName = $_POST['countryName'];
    
    // Requesting the insertion
    try {
        // Prepare the statement
        $stmt = $conn->prepare("INSERT INTO countries (name) VALUES (?)");
        // Check for errors in statement preparation
        if (!$stmt) {
            throw new Exception("Error in statement preparation: " . mysqli_error($conn));
        }
        // Bind parameters
        $stmt->bind_param("s", $countryName);
        // Execute the statement
        if (!$stmt->execute()) {
            throw new Exception("Error in statement execution: " . mysqli_error($conn));
        }
        echo "Country added successfully!";
    } catch (Exception $e) {
        // Handle exceptions
        echo "Error: " . $e->getMessage();
    }
    // Close the statement
    $stmt->close();
    
    // Redirect to the main page
    header('Location: admin.php');
    exit();
}
?>