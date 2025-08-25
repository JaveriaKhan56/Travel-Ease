<?php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the selected user ID from the POST request
    $selectedId = $_POST['selectedId'];

    // Prepare the SQL statement to set the membership to NULL for the selected user ID
    $stmt = $conn->prepare("UPDATE users SET membership = NULL WHERE user_id = ?");
    $stmt->bind_param("i", $selectedId);
    $stmt->execute();

    // Check for errors
    if ($stmt->error) {
        echo "Error: " . $stmt->error;
        $stmt->close();
        $conn->close();
        exit();
    }

    // Check if any rows were affected (i.e., if the update was successful)
    if ($stmt->affected_rows > 0) {
        echo "Membership deleted successfully";
    } else {
        echo "No record found with the selected ID.";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Redirect to the admin page
    header("Location: admin.php");
    exit();
}
?>
