<?php

  // include Database connection file 
  include("scripts/db_connection.php");
  //Getting the IP address of user
  $ip= $_SESSION['sess_user_ip'];

  //Query of Count items in the cart 
  $query = "SELECT COUNT(id) as cart FROM cart where user_ip='$ip'";

$data = '';
    
    //Check if Query resturned any data
    if (!$result = mysqli_query($db,$query)) {
        exit(mysqli_error($db));
    }

    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
      $number = 1;
      while($row = mysqli_fetch_assoc($result))
      {

        $data .= $row['cart'];
 
      }
    }
    else
    {
      // records now found 
      $data .= '0';
    }


    //store no of items in the cart to session
    $_SESSION['sess_cart'] = $data;


?>

<style type="text/css">
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.badge {
  
  top: -10px;
  right: -10px;
  padding: 3px 5px;
  border-radius: 50% !important;
  background-color: red;
  color: white;
}

</style>
<div class="header">
    <a href ="index.php"> <img src="images/logo.png"> </a>
</div>

<div class="topnav" id="navbar">
  <a href="index.php">Home</a>
  <a href="aboutus.php">About</a>
  <a href="brands.php">Collection</a>
  <a href="contact.php">Contact</a>
  <a href="faqs.php">FAQs</a>
  <!--Check if cart has items them show no else show 0-->
  <a href="cart.php" style="float: right;" class="fa fa-shopping-cart fa-5px"><span class="badge">
    <?php 
      if (isset($_SESSION['sess_cart']))
      { echo $_SESSION['sess_cart']; }
      else
      { echo "0"; } ?></span>
  </a>

  <div class="dropdown" style="float:right">
    <button class="dropbtn ">
      <i class="fa fa-user fa-5px"></i>
    </button>
    <!--If User is Logged in then show logout and order History option Else Show only Login Option-->
    <div class="dropdown-content">
      <?php if(!isset($_SESSION["sess_user"])){ ?>
      <a href="login.php">Login</a>
      <?php }elseif(isset($_SESSION["sess_user"])){ ?>
      <a href="order_history.php">Order History</a>
      <a href="logout.php">Logout</a>
      <?php } ?>
    </div>
  </div> 

  
  <div style="float:right; padding-top: 13px;">
    <input type="text" id="search" name="search" placeholder="Search">
    <button  id="search_btn" value="search_btn" hidden="true">Search</button>
  </div>
</div>