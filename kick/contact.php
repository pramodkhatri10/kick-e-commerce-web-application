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
  <link rel="stylesheet" href="styles/contact.css">
  <script src="scripts/scripts1.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>

<body>
    <?php include('header.php');?>

    <div class="wrapper">
        <h2>Contact Us</h2>

        <div id="error_message"></div>


        <form id="myform" onsubmit="return myvalidation()">
            <div class="input_field">
                <input type="text" placeholder="Name" id="name">
            </div> <br>
            <div class="input_field">
                <input type="text" placeholder="Subject" id="subject">
            </div> <br>
            <div class="input_field">
                <input type="text" placeholder="Phone" id="phone">
            </div> <br>
            <div class="input_field">
                <input type="text" placeholder="Email" id="email">
            </div> <br>
            <div class="input_field">
                <textarea id="message" placeholder="Message"></textarea>
            </div> <br>
            <div class="btn">
                <input type="submit" value="Submit">
            </div>

        </form>
        <!-- /Form -->
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