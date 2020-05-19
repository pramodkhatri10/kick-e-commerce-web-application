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
  <title> KICK</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="icon" href="images/icon.png">
  <link rel="stylesheet" href="styles/styles.css">
  <link rel="stylesheet" href="styles/product.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <script src="https://use.fontawesome.com/c1aff5cbab.js"></script>


</head>
<body>

<!--Include Header-->
<?php include('header.php');?>
<!--Store IP Address to a hidden field so we can access in JS-->
<input type="hidden" name="ip" id="ip" value="<?php echo $ip; ?>">

<br><br>

<center>
<div class="row">
<?php
  
  // include Database connection file 
  include("scripts/db_connection.php");

  // Get Search Word which is sent as a Parameter in the link
  $search_word = $_GET['search_word'];

//Query
  $query = "SELECT * FROM products where name LIKE '%$search_word%' OR brand LIKE '%$search_word%' OR description LIKE '%$search_word%'" ;

  $data = '';
    
  //IF query does not returned any data then exit
  if (!$result = mysqli_query($db,$query)) {
        exit(mysqli_error($db));
    }

    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
      $number = 1;
      while($row = mysqli_fetch_assoc($result))
      {

        $data .= '<div class="column">
        <div class="polaroid">
            <a href="product.php?id='.$row['id'].'"><img src="images/'.$row['image'].'" alt="5 Terre" style = width:100% width="300" height="300"></a>
            <div class="container">
              <p>'.$row['brand'].': '.$row['name'].'<br> <b> $'.$row['price'].' </b></p>

    <label for="size">Size:</label>
        <select class="size" id="size'.$row['id'].'">
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
        </select> &nbsp;&nbsp;

            <button onclick="addtocart('.$row['id'].')"> Add to Cart</button>      </div>
        </div>
      </div>';

      }
    }
    else
    {
      // records now found 
      $data .= '<tr><td colspan="10">Records not found!</td></tr>';
    }


    echo $data;

?>

</div>
 </center>




<h2> Recommendation</h2>
<div class="banner">
  <div class=" big-text">50% OFF</div>
   <div>the entire store</div>
   <a href="https://www.macys.com/">Macy's</a> <a href="https://oldnavy.gap.com/?tid=onps024289&kwid=1&ap=7&gclid=CjwKCAjwv4_1BRAhEiwAtMDLsvetaZ3y64RBx6pQ3ZPJsswCknAwUP8x4sLRzWkKRT5ZQKaHaygg9xoC4LkQAvD_BwE&gclsrc=aw.ds">OLD NAVY</a>
   <a href="https://www.rossstores.com/">ROSS</a> <a href="https://www.forever21.com/us/shop">FOREVER 21</a>
 </div>
</div>


<!--<div class="footer">
  <h2>Footer</h2>
</div> -->

<footer id = "footer"> 
          
  <!-- Company Details -->
  <!-- 1. Address  
       2. Contact Number 
       3. Enquiry Mail  
  -->
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

<script>
  window.onscroll = function() {myFunction()};
  
  var header = document.getElementById("navbar");
  var sticky = header.offsetTop;
  
  function myFunction() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  }
  </script>
<!--Including JS file and Jquery-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="scripts/script.js"></script>

</body>
</html>
