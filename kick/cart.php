<?php
//Maintaining Session
session_start();
//Getting the IP address of user
$_SESSION['sess_user_ip']=$_SERVER['REMOTE_ADDR'];
$ip= $_SESSION['sess_user_ip'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>KICK</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="icon" href="images/icon.png">
  <link rel="stylesheet" href="styles/styles.css">
  <link rel="stylesheet" href="styles/cart.css">
  <link rel="stylesheet" href="styles/product.css">
  <script src="scripts/scripts1.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

<style>
.remove {
  border: none;
}

</style>

</head>

<body>
  <!--Include Header File-->
    <?php include('header.php');?>

    
<div class="row">
  <div class="col-25">
    <div class="container">
      <h1>Cart <span style="color:black"><i class="fa fa-shopping-cart"></i></span></h1>
      

<?php
  // include Database connection file 
  include("scripts/db_connection.php");
  //Get Ip address of the user
  $ip= $_SESSION['sess_user_ip'];
  //Query
  $query = "SELECT c.id, p.name, c.size, c.quantity, p.price, p.image, p.brand FROM cart as c JOIN products as p ON c.product_id = p.id where c.user_ip='$ip'";

$total = 0;
  // Design initial table header 
$data = '<table style="width:100%">
          <tr>
            <th style="width:20%"></th>
            <th style="width:40%">Products</th>
            <th style="width:10%">Size</th>
            <th style="width:10%">Quantity</th>
            <th style="width:10%">Price</th>
            <th style="width:10%"></th>
          </tr>';
    
  //Check if Query returned data or not
  if (!$result = mysqli_query($db,$query)) {
        exit(mysqli_error($db));
    }

    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
      while($row = mysqli_fetch_assoc($result))
      {
        //calculating Total amount of Products in Cart
        $total = $total + $row['price'];
        $data .= '<tr>
                    <td><img style="height: 150px;" src="images/'.$row['image'].'"></td>
                    <td><p style="text-align: left;">'.$row['brand'].': '.$row['name'].'</p></td>
                    <td>'.$row['size'].'</td>
                    <td>'.$row['quantity'].'</td>
                    <td>$'.$row['price'].'</td>
                    <td><button class="remove" onclick="remove_cart_item('.$row['id'].')"><i style="font-size:30px; float: left; color:red;" class="fa fa-trash"></i></button></td>
                  </tr>';
      }
      $data .= '<tr>
                <td colspan="5"><hr></td>
              </tr>
              <tr>
                <td colspan="4"><p style="text-align: right;">Total</p></td>
                <td><b>$'.$total.'</b></td>
              </tr>
              <tr>
                <td colspan="4"><p style="text-align: right;">Free Shipping</p></td>
                <td><b>$0</b></td>
              </tr>
              <tr>
                <td colspan="4"><p style="text-align: right;">Grand Total</p></td>
                <td><b>$'.$total.'</b></td>
              </tr>
        </table>
        <a href="checkout.php" class="size" onclick="">Checkout</a>';
    }
    else
    {
      // records now found 
      $data = '<tr><td colspan="10">Cart is Empty</td></tr>';
    }
    
//to show the data on Html we have to use echo function in php    
echo $data;

?>
      

    </div>
  </div>
  
</div>

    
    <!--Footer-->
    <footer id = "footer"> 
        <!--Company Details-->
        <div class="company-details"> 
            <div class="row"> 
                <div id ="col1"> 
                    <span id = "icon" class="fa fa-map-marker"></span> 
                          
                    <span> 
                        345 California Street, 
                        <br />San Francisco, CA, 91235 
                    </span> 
                </div> 
                      
                <div id ="col2"> 
                    <span id="icon" class="fa fa-phone"></span> 
  
                    <span> 
                        +1 415 876 3499
                    </span> 
                </div> 
                          
                <div id ="col3"> 
                    <span id="icon" class="fa fa-envelope"></span> 
                    <span>info@kick.com</span> 
                </div> 
            </div>
        </div> 
                  
        <!-- Copyright Section -->
        <div class="copyright"> 
            <p>©2020 All rights reserved | KICK Inc.</p> 
          
            <ul class="contact"> 
                <li> 
                    <a href="https://twitter.com/explore" class="fa fa-twitter"> 
                    </a> 
                </li> 
                  
                <li> 
                    <a href="https://www.facebook.com/" class="fa fa-facebook"> 
                    </a> 
                </li> 
                  
                <li> 
                    <a href="https://www.instagram.com/accounts/login/?hl=en" class="fa fa-instagram"> 
                    </a> 
                </li> 
                <li> 
                  <a href="https://in.linkedin.com/?trk=organization_guest_nav-header-logo" class="fa fa-linkedin"> 
                  </a> 
              </li> 
            </ul> 
        </div> 
      </footer> 
      
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="scripts/script.js"></script>   

  </body>
  </html>