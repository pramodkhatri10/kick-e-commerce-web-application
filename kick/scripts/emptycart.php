<?php
session_start();


    // include Database connection file
    include("db_connection.php");
	
	$user_ip = $_POST['ip'];
    // delete all items from Cart
    $query = "DELETE FROM cart where user_ip = '".$user_ip."'";
    if (!$result = mysqli_query($db,$query)) {
        exit(mysqli_error($db));
    }




?>