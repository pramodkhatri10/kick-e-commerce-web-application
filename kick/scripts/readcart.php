<?php
session_start();

// include Database connection file
include("db_connection.php");
//Store user IP in a variable
$user_ip = $_POST['user_ip'];

    
    $query = "SELECT c.id, p.name, c.size, c.quantity, p.price, p.image, p.brand, p.description FROM cart as c JOIN products as p ON c.product_id = p.id where c.user_ip='$user_ip'";

    //IF query does not returned any data then exit
    if (!$result = mysqli_query($db,$query)) {
        exit(mysqli_error($db));
    }
    $response = array();
    $i = 0;
    if(mysqli_num_rows($result) > 0) {
        //Store Rows in Response Array
        while ($row = mysqli_fetch_assoc($result)) {
            $response[$i] = $row;
            $i++;
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    //Encode Response Array in Json Format
    echo json_encode($response);



?>
