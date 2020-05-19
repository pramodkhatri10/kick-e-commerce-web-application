<?php

	if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['user_name']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['zip_code']) && isset($_POST['password']) )
	{
		// include Database connection file 
		
		include("db_connection.php");

		// get values 
    	$first_name = $_POST['first_name'];
    	$last_name = $_POST['last_name'];
    	$user_name = $_POST['user_name'];
    	$email = $_POST['email'];
    	$address = $_POST['address'];
    	$city = $_POST['city'];
    	$state = $_POST['state'];
    	$zip_code = $_POST['zip_code'];
    	$password = $_POST['password'];

    	//Query
		$query = "INSERT INTO user(first_name, last_name, user_name, email, address, city, state, zip_code, password) VALUES('$first_name', '$last_name', '$user_name', '$email', '$address', '$city', '$state', '$zip_code', '$password')";
		//IF query does not returned any data then exit
		if (!$result = mysqli_query($db,$query)) {
	        exit(mysqli_error($db));
	    }
	    echo "1 Record Added!";
	}

?>