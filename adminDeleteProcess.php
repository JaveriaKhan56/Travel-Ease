<?php
include("db.php");
$selectedId = $_POST['selectedId'];
$stmt = $conn->prepare("DELETE FROM travel_packages WHERE PackageID=?");
$stmt->bind_param("i", $selectedId);
$stmt->execute();
if ($stmt->error) {
     echo "Error" . $stmt->error;
     exit();
}
if ($stmt->affected_rows > 0){
     echo "Record deleted successfully";
     $conn->close();
     header("Location: admin.php");
}

