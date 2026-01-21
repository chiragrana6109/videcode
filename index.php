<?php
/**
 * Index / Home Page
 * Entry point for Tech Fest Management System
 */

session_start();

// Redirect based on session
if (isset($_SESSION['user_role'])) {
    $path = $_SESSION['user_role'] === 'owner' ? 'views/owner_dashboard.php' : 'views/coordinator_dashboard.php';
    header('Location: ' . $path);
    exit;
}

// Otherwise show login
header('Location: views/login.php');
exit;
?>