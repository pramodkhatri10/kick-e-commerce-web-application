<?php
session_start();

	if(isset($_POST['product_id']) && isset($_POST['user_ip']) && isset($_POST['today_date']) && isset($_POST['quantity'])  )
	{
		// include Database connection file 
		include("db_connection.php");

		// get values 
		$product_id = $_POST['product_id'];
		$user_ip = $_POST['user_ip'];
    	$quantity = $_POST['quantity'];
    	$size = $_POST['size'];
    	$today_date = $_POST['today_date'];
    	
    	// Query
		$query = "INSERT INTO cart(user_ip, product_id, size, quantity, created_at) VALUES('$user_ip', '$product_id', '$size', '$quantity', '$today_date')";
		//IF query does not returned any data then exit
		if (!$result = mysqli_query($db,$query)) {
	        exit(mysqli_error($db));
	    }
	    // IF query Contains data that means Query Runs Successfully
	    echo "1 Record Added!";
	}



?>