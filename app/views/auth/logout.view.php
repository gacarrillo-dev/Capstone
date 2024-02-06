<?php
session_start();

// Destroy the session
session_destroy();

// Redirect to the login page
/**
 * TODO: Change location to correct path.
 */
header('Location: /se266/final_project/views/auth/login.view.php');
exit();
