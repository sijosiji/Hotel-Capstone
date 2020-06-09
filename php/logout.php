
<?php
SESSION_START();

$_SESSION = array();
session_destroy();

header("Location: http://localhost/Capstone_Project/login.php");

 ?>
