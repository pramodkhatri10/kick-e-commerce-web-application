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
  
  <script src="scripts/scripts1.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>

<body>
  <!--Include Header-->
<?php include('header.php');
//if User is not logged in and Not Guest then redirect to login page
if(!(isset($_SESSION['sess_user'])) && !($_GET["guest"] == "true"))
{
  header("Location: login.php");
}

//If Cart is Empty then goto home page
if($_SESSION['sess_cart']==0){
  header("Location: index.php");
}
?>

<!--Hidden field containing IP to be accessed from JS-->
<input type="hidden" name="ip" id="ip" value="<?php echo $ip; ?>">
    
<div class="row">
  <div class="col-75">
    <div class="container">
<!--If User is a Login USer thern execute the following code-->
<?php if(isset($_SESSION['sess_user'])){ 
// include Database connection file 
    include("scripts/db_connection.php");
// Get user ID 
    $id = $_SESSION['sess_user_id'];
//Get user details on the basis of ID
    $query = "SELECT * FROM user WHERE user_id = '$id' ";

    $name = '';
    $email = '';
    $address = '';
    $city = '';
    $state = '';
    $zip = '';

//Check if query returned any data or not
    if (!$result = mysqli_query($db,$query)) {
        exit(mysqli_error($db));
    }

    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
        $number = 1;
        while($row = mysqli_fetch_assoc($result))
        {
            //Store data into variables
            $name = $row['first_name']." ".$row['last_name'];
            $email = $row['email'];
            $address = $row['address'];
            $city = $row['city'];
            $state = $row['state'];
            $zip = $row['zip_code'];
 
        }
    }
    else
    {
        // records not found 
        $data .= '<tr><td colspan="10">Records not found!</td></tr>';
    }

 ?>   <!--Form for Logged in User-->   
      <form id= "form" class="form" method="post">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            
            <label for="name"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="user_name" name="firstname" placeholder="Full Name" value="<?php echo $name; ?>" required>

            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="email address" value="<?php echo $email; ?>" required>

            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="street address" value="<?php echo $address; ?>" required>

            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="City" value="<?php echo $city; ?>" required>

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="State" value="<?php echo $state; ?>" required>
              </div>

              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="zip code" value="<?php echo $zip; ?>" required>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>

            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="name on card" required>

            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="card number" required>

            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="exp month" required>

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="exp year" required>
              </div>

              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352" required>
              </div>

            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label><br>
        <a  value="Continue to checkout" class="btn" onclick="checkout()">Continue to checkout</a>
      </form>


<?php } else { ?>

    <!--Else Form for Guest User-->
    <form id= "form" class="form" method="post" action="">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>

            <label for="name"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="user_name" name="firstname" placeholder="Full Name" value="" required>
            <p id="name_error" style="color: red;"></p>

            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="email address" value="" required>
            <p id="email_error" style="color: red;"></p>

            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="street address" value="" required>
            <p id="address_error" style="color: red;"></p>

            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="City" value="" required>
            <p id="city_error" style="color: red;"></p>

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="State" value="" required>
                <p id="state_error" style="color: red;"></p>
              </div>

              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="zip code" value="" required>
                <p id="zip_error" style="color: red;"></p>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>

            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="name on card">
            <p id="cname_error" style="color: red;"></p>

            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="card number">
            <p id="cnum_error" style="color: red;"></p>

            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="exp month">
            <p id="expmonth_error" style="color: red;"></p>

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="exp year">
                <p id="expyear_error" style="color: red;"></p>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
                <p id="cvv_error" style="color: red;"></p>
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label><br>
        <a  value="Continue to checkout" class="btn" onclick="checkout()">Continue to checkout</a>
      </form>
<?php } ?>

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
<!--Including JS file and Jquery-->      
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="scripts/script.js"></script>

  </body>
  </html>