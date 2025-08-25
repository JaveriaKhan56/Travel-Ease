<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session if it's not already started.
}
unset($_SESSION['logged_In']);
session_destroy(); // Destroy the session and log out the user
header("location: index.php");
exit();
?>