<?php

// Connection variables 
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "kick";

// Connect to MySQL Database 
$db = mysqli_connect($host, $user, $password) or die("Could not connect to database");
date_default_timezone_set("Asia/Karachi");

// Select MySQL Database 
mysqli_select_db($db,$database);

?>