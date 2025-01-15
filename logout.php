<?php
session_start();

// Destroy session and logout
session_unset();
session_destroy();
header("Location: index.php");
exit();
?>
