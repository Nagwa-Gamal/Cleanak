<?php
session_destroy();
 
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['pass']);
unset($_SESSION['email']);
unset( $_SESSION['gender']);
unset($_SESSION['verify']);
header("location: login.php");
?>