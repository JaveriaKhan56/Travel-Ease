<?php
include('./sessionStart.php');
unset($_SESSION['Logged_In']);
session_destroy();
header("Location: index.php");