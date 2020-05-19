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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <script src="https://use.fontawesome.com/c1aff5cbab.js"></script>

</head>
<body>

<?php include('header.php');?>

<div class="box">
  <br>
  <br>
    <h3 class="heading" style="padding-left: 1em;">Frequently Asked Questions</h3> <br>
    <div class="faqs">
     <details>
            <summary>How do I return a Kicks purchase?</summary>
            <p class="text">You can take the items you want to take to any Kicks store in Bay area.</p>
            </details>
        <details>
            <summary>How do I return a Kicks.com order? </summary>
            <p class="text">If you are a Kicks member, you can return free by signing in to your member profile.</p>
            </details>
       <details>
            <summary>Do I need a receipt to return items at a Kicks store?</summary>
        <p class="text">To return at Kicks.com, you do not need a receipt. However, you will need a order number. And if you don't have order number, you will still gwt full refund
         at a store.</p>
            </details>
        <details>
            <summary>What about defective items? </summary>
            <p class="text">If your item have been defective,and it's been less than 30 days,since your purchase, please contact us to return the item. See your
          warranty information for additional details. </p>
            </details>
            <details>
            <summary>How long it takes to deliver?</summary>
            <p class="text">It takes 3-5 days within US.</p>
            </details>
        <details>
            <summary>Do you provide discounts?</summary>
            <p class="text">We give 30% discount during New Year eve, Christmas, 4th July and 15% student discount at all times. </p>
            </details>
            <details>
            <summary>Where are you located?</summary>
            <p class="text">We are located in San Francisco, Emeryville, Vallejo and San Jose.</p>
            </details>
          </div>
     </div>

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
