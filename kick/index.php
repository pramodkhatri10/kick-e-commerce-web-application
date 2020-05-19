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
  <!--<script src="scripts/stickyscript.js"></script>-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <script src="https://use.fontawesome.com/c1aff5cbab.js"></script>

</head>

<body>
    

    <?php include('header.php');?>

    <div id="introducing">
      <a href="introducingjoyride.html"><img src="images/introducingjoyride.jpg"></a>
      <p><b>INTRODUCING THE NEW <br> NIKE JOYRIDE RUN</b></p>
    </div>
    <h2>New Arrivals</h2>
    <center>
    <div class="row">
      <div class="column">
          <div class="polaroid">
            <!--we can make the image look perfect by doing style="max-width: 100%; max-height: 100%;
            but, all the products will not align perfectly horizontal or vertical cos of diff sizes-->
            <a href="brands.php"><img src="images/converse.jpg" alt="5 Terre" style = width:100% width="300" height="300"></a>
            <div class="container">
              <p>Converse Chuck Taylor <br> <b> $55 </b></p>        
            </div>
          </div>
      </div>
      <div class="column">
        <div class="polaroid">
          <a href="brands.php"><img src="images/nike.jpg" alt="5 Terre" style = width:100% width="300" height="300"></a>
          <div class="container">
            <p>Nike Air MAx 270 <br> <b> $160 </b></p>        
          </div>
        </div>
      </div>
      <div class="column">
        <div class="polaroid">
          <a href="brands.php"><img src="images/vans.png" alt="5 Terre" style = width:100% width="300" height="300"></a>
          <div class="container">
          <p>Vans Mirage <br> <b> $60 </b></p>
          </div>
        </div>
      </div>
    </div> </center>
    <h2>Sale</h2>
    <center>
    <div class="row">
      <div class="column">
          <div class="polaroid">
            <a href="brands.php"><img src="images/reebok.jpg" alt="5 Terre" style = width:100% width="300" height="300"></a>
            <div class="container">
              <p>Zig Reebok <br> <b> <del>$170</del>  $140 </b></p>
            </div>
          </div>
      </div>
      <div class="column">
        <div class="polaroid">
          <a href="brands.php"><img src="images/fila.jpg" alt="5 Terre" style = width:100% width="300" height="300"></a>
          <div class="container">
            <p>Fila Grant Hill <br> <b> <del>$220</del>  $150 </b></p>
          </div>
        </div>
      </div>
      <div class="column">
        <div class="polaroid">
          <a href="brands.php"><img src="images/underarmour.jpg" alt="5 Terre" style = width:100% width="300" height="300"></a>
          <div class="container">
            <p>Underarmour UA <br> <b> <del>$150</del>   $125 </b></p>
            </div>
        </div>
      </div>
    </div> </center>
    <h2> Recommendation</h2>
    <div class="banner">
      <div class=" big-text">50% OFF</div>
      <div>the entire store</div>
      <a href="https://www.macys.com/">Macy's</a> <a href="https://oldnavy.gap.com/?tid=onps024289&kwid=1&ap=7&gclid=CjwKCAjwv4_1BRAhEiwAtMDLsvetaZ3y64RBx6pQ3ZPJsswCknAwUP8x4sLRzWkKRT5ZQKaHaygg9xoC4LkQAvD_BwE&gclsrc=aw.ds">OLD NAVY</a>
      <a href="https://www.rossstores.com/">ROSS</a> <a href="https://www.forever21.com/us/shop">FOREVER 21</a>
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

    <script>
      //for sticky navbar
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
