<?php
session_start();

if( isset($_POST['id']) )
{
    // include Database connection file
    include("db_connection.php");

    //Get ID
    $id = $_POST['id'];
    
    //Query
    $query = "DELETE FROM cart WHERE id = '$id'";
    if (!$result = mysqli_query($db,$query)) {
        exit(mysqli_error($db));
    }


}



?>