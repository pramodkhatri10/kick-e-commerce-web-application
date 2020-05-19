<?php
session_start();

// include Database connection file
include("db_connection.php");

$email = $_POST['email'];

    //Check if user already exists in DB on the basis of Email
    $query = "SELECT * FROM user WHERE email='".$email."'";
    
    //IF query does not returned any data then exit
    if (!$result = mysqli_query($db,$query)) {
        exit(mysqli_error($db));
    }
    $response = array();
    
    if(mysqli_num_rows($result) > 0) {
        $response['status'] = 200;
        $response['message'] = "Email Already Exists";
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    // Encode response array in json Format
    echo json_encode($response);



?>
