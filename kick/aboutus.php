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
  <link rel="stylesheet" href="styles/aboutus.css">
  <script src="https://use.fontawesome.com/c1aff5cbab.js"></script>
  <!--<script type="text/javascript" src="/scripts/scripts.js"></script>-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 


</head>
  <body>

  <?php include('header.php');?>

  <div class="about-section">
    <h2>KICK AT A GLANCE</h2>
    <p>At KICK, our purpose is simple: to live and deliver WOW at economical price.
        In 2019, we began as a small online retailer that only sold goodwill shoes. 
        Today, we sell world branded shoes at economical price with 100% quality ensured. 
        That "more" is providing the very best customer service, customer experience, and 
        company culture. We aim to inspire the world by showing it's possible to simultaneously 
        deliver happiness to customers, employees, vendors, shareholders, and the community in a 
        long-term, sustainable way. We hope that in the future people won't even realize we started
         selling shoes online. Instead, they'll know KICK as a service company that just happens to sell happyness to customers.
         </p>
  </div>
  
  <h3 style="text-align:center">Meet Our Team</h3>
  <div class="row">
    <center>
    <div class="column">
      <div class="card">
        <img src="images/pramod.jpg" alt="Jane" style = width:100% width="300" height="300">
        <div class="container">
          <h2>Pramod Khatri</h2>
          <p class="title">CEO & Founder</p>
          <p>Alwasy Willing to Learn.</p>
          <p>pramod@kick.com</p>
          <p> +1 415-874-0973</p>
        </div>
      </div>
    </div>
  
    <div class="column">
      <div class="card">
        <img src="images/bhupen.jpg" alt="Jane" style = width:100% width="300" height="300">
        <div class="container">
          <h2>Bhuprendra Chaudhary</h2>
          <p class="title">Chief Financial Office</p>
          <p>Accounting and Financial Competence.</p>
          <p>bhupen@kick.com</p>
          <p> +1 415-348-1297</p>
        </div>
      </div>
    </div>
    
    <div class="column">
      <div class="card">
        <img src="images/nushan.jpg" alt="Jane" style = width:100% width="300" height="300">
        <div class="container">
          <h2>Nushan Rana</h2>
          <p class="title">Secretary</p>
          <p>Organisational Abilities and Efficiency.</p>
          <p>nushan@kick.com</p>
          <p> +1 415-765-4801</p>
        </div>
      </div>
    </div>
    <div class="column">
        <div class="card">
            <img src="images/bikram.jpg" alt="Jane" style = width:100% width="300" height="300">
            <div class="container">
            <h2>Bikram Tamang</h2>
            <p class="title">Operations Manager</p>
            <p>Awareness of internal and external customer needs</p>
            <p>bikram@kick.com</p>
            <p> +1 415-654-4307</p>
          </div>
        </div>
      </div>
      </center>
  </div>

  
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

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="scripts/script.js"></script>

  </body>
</html>
