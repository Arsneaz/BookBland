<?php
// Start or resume the session
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: Login.php"); // Redirect to your login page
    exit();
}

// Check if the user clicked the logout link
if (isset($_GET['logout'])) {
    // Clear all session variables
    session_unset();
    
    // Destroy the session
    session_destroy();

    // Redirect to the index page or any other desired page
    header("Location: ../../index.php");
    exit();
}
