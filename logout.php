<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
$_SESSION = [];

// Destroy the session
session_destroy();
// Redirect to the login page
header("Location: web.php");
exit();
?>
