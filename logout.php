<!-- Logs the user out by clearing session vars, redirects to index. -->
<?php
session_start();
$_SESSION['loggedin'] = false;
$_SESSION['user'] = null;
header('Location: index.php');
?>
