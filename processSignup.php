<?php
include("db.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check_query = "SELECT username FROM users WHERE email = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['existAccount'] = "Email already exists. Try a different email.";
        header("Location: signUp.php");
        exit();
    } else {
        $insert_query = "INSERT INTO users (username, email, user_password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            header("Location: login.php");
            exit();
        } else {
            $_SESSION['accountError'] = "An error occurred during account creation.";
            header("Location: signUp.php");
            exit();
        }
    }

    $stmt->close();
}

$conn->close();
?>
