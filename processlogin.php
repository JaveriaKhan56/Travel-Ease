<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['logged']) || isset($_SESSION['adminLogged'])) {
    header("Location: home.php");
    exit();
}
include("db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email == "admin@gmail.com" && $password == "321") {
        $_SESSION["adminLogged"] = array('email' => $email, 'password' => $password);
        header("Location: admin.php");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row["user_password"])) {
                // $_SESSION["Logged_In"] = $email;
                $_SESSION["Logged_In"] = array('id' => $row['user_id'],  'email' => $email, 'password' => $password);
                header("Location: index.php");
                exit();
            } else {
                $_SESSION["loginError"] = "Invalid password.";
                header("Location: login.php");
                exit();
            }
        } else {
            $_SESSION["loginError"] = "Account not found.";
            header("Location: login.php");
            exit();
        }
        $stmt->close();
    }
} else {
    header("Location: index.php");
    exit();
}
$conn->close();
