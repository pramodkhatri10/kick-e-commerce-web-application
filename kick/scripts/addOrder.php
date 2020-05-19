<?php
session_start();

	if(isset($_POST['product_name']) && isset($_POST['size']) && isset($_POST['quantity']) && isset($_POST['price']) && isset($_POST['brand']) && isset($_POST['description']) && isset($_POST['user_name']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['zip']) )
	{
		// include Database connection file 
		include("db_connection.php");

		// get values 
        if(isset($_SESSION['sess_user_id'])){
            $user_id = $_SESSION['sess_user_id'];
        }else{
            $user_id = '';
        }
        $user_ip = $_POST['user_ip'];
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];

		$order_id;

		$product_name;
        $size;
    	$quantity;
    	$price;
    	$brand;
    	$description;

		$query = "INSERT INTO orders(user_id, ip, name, email, address, city, state, zip_code) VALUES('$user_id', '$user_ip', '$user_name', '$email', '$address', '$city', '$state', '$zip')";
        //IF query does not returned any data then exit
		if (!$result = mysqli_query($db,$query)) {
	        exit(mysqli_error($db));
	    }

	    $query = "SELECT max(id) as id FROM orders where user_id = ".$user_id." OR ip = '".$user_ip."'";
        //IF query does not returned any data then exit
	    if (!$result = mysqli_query($db,$query)) {
        	exit(mysqli_error($db));
    	}
        // if query results contains rows then featch those rows 
    	if(mysqli_num_rows($result) > 0) {
        	while ($row = mysqli_fetch_assoc($result)) {
            	$order_id = $row['id'];
        	}
    	}
        //Storing Multiple Products into different variables and Store Items in separate Table against the order ID
		for ($i=0; $i < sizeof($_POST['product_name']) ; $i++) { 
			
			$product_name = $_POST['product_name'][$i];
    		$size = $_POST['size'][$i];
    		$quantity = $_POST['quantity'][$i];
    		$price = $_POST['price'][$i];
    		$brand = $_POST['brand'][$i];
    		$description = $_POST['description'][$i];

            echo $order_id."<br>";

    		$query = "INSERT INTO order_items(order_id, product_name, size, quantity, price, brand, description) VALUES('$order_id', '$product_name', '$size', '$quantity', '$price', '$brand', '$description')";
			if (!$result = mysqli_query($db,$query)) {
	        	exit(mysqli_error($db));
	    	}

		}
    	
    	echo $order_id;

		
	}

?>