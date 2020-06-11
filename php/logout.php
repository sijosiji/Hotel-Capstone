<!--
Logout page script
-->

<!-- Closes the user session -->
<?php
SESSION_START();

$_SESSION = array();
session_destroy();

header("Location: http://localhost:8080/cap/login.php");

 ?>
