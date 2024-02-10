<?php
session_start();

// Destroy the session
session_destroy();

// Redirect to the login page
/**
 * TODO: Change location to correct path.
 */
header('Location: login.php');
exit();
