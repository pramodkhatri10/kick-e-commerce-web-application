<?php
session_start();
//Un Set User data from Session
unset($_SESSION['sess_user']);
//Session Destroy
session_destroy();
//After Logout Goto Home Page
header("location:index.php");
?>
