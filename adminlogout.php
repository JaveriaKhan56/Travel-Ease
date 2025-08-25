
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session if it's not already started.
}
unset($_SESSION['adminLogged']);
session_destroy(); // Destroy the session and log out the admin
header("location: index.php");
exit();
?>