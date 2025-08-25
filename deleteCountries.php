<?php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedId = $_POST['selectedId'];

    $stmt = $conn->prepare("DELETE FROM countries WHERE CountryID=?");
    $stmt->bind_param("i", $selectedId);
    $stmt->execute();

    if ($stmt->error) {
        echo "Error: " . $stmt->error;
        exit();
    }

    if ($stmt->affected_rows > 0) {
        echo "Record deleted successfully";
        $stmt->close();
        $conn->close();
        header("Location: admin.php");
        exit();
    } else {
        echo "No record found with the selected ID.";
        $stmt->close();
        $conn->close();
    }
}
?>