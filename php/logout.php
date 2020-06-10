<!--
Logout page script
-->

<!-- Closes the user session -->
<?php
SESSION_START();

$_SESSION = array();
session_destroy();

header("Location: http://localhost/cap/login.php");

 ?>
