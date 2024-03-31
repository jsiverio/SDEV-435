<?php
session_start();
// Unset all of the session variables.
$_SESSION = array();

// Kill session cookie if it exists
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroy the session.
session_destroy();
header("Location: ../../index.php");
?>