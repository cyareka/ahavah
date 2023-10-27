<?php
session_start();

try {
  if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
    // Perform logout actions here
    $_SESSION = array();
    session_unset();
    session_destroy();
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: 0");

    // Redirect to the specified destination page
    if (isset($_GET['redirect'])) {
      $redirect = $_GET['redirect'];
      header("Location: $redirect");
      exit();
    }

    // If no redirect is specified, fall back to a default landing page
    header("Location: ../landing.php");
    exit();
  }
} catch (Exception $e) {
  echo "An error occurred while logging out. Please try again later.";
}
?>