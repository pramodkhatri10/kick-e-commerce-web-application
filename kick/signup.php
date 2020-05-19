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
  <script defer src="scripts/scripts.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <!DOCTYPE html>
  <html lang="en">
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://use.fontawesome.com/c1aff5cbab.js"></script>
  
  </head>
  
  <body>
    <!--including Header-->
      <?php include('header.php');?>
  

<form id= "form" class="form" method="post">
  <div class = "signup-container">
  <h1> Sign up Now </h1>
    <h2> Personal Information </h2>
    <div class="textsection">
      
      <input type="text" id="first_name"  placeholder="Enter your First Name" name="" value="" required>

      <input type="text" id="last_name" placeholder="Enter your Last Name" name="" value="" required>

      <input type="text" id="user_name" placeholder="Enter a username" name="" value="" required>

      <input type="email"  id = "email"  placeholder="Enter your E-mail" name="" value="" required>

      <input type="address"  id = "address"  placeholder="Enter your Address" name="" value="" required>

      <input type="city"  id = "city"  placeholder="Enter your City" name="" value="" required>

      <input type="state"  id = "state"  placeholder="Enter your State" name="" value="" required>

      <input type="zip_code"  id = "zip_code"  placeholder="Enter your Zip Code" name="" value="" required>

      <br>

      <input type="password" placeholder="Enter your Password" id = "password" name="password" value=""   required>

      <input type="password" placeholder="Confirm your Password" id = "password2" name="" value="" required>

    </div>
    <div id = "popupmsg">
      <p id ="capital" class = "invalid"> At lease 1 UpperCase is needed </p>
      <p id="number" class="invalid"> At lease one number is required </p>
      <p id ="length" class="invalid" >Minimun 8 characters </p>
      <p id = "input" class= "invalid"> </p>
    </div>

    <div id = "unmatchError">
        <p id = "noMatch" class = "invalid">Password doesn't Match, Try again</p>
        <P id = "match"  class = "valid" > Password match </P>
    </div>
    <p id = "valid" class = "valid"> </p>
    
    <h3>
    <p><input type="checkbox" required> I agree to all the terms and conditions <p>
    <p><input type="checkbox"> Inform me about offers and discounts.<p>
    </h3>
  <button type = "submit" id= "butnsup" onclick="return confirmPassword()"> Register</button>
  <p id = "msgPrint"></p>
</div>
</form>
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

  var inputPass = document.getElementById("password");
  var length= document.getElementById("length");
  var number = document.getElementById("number");
  var uppercase = document.getElementById("uppercase");




  //shows popupsmsg when clicked on password feild
  inputPass.onfocus = function(){
  document.getElementById("popupmsg").style.display= "block";
  }

  

  //when the click is outside the password box
  inputPass.onblur = function(){
    document.getElementById("popupmsg").style.display = "none";
  }

  //when something is being typed on password feild
  inputPass.onkeyup = function(){

    var letterUppercase = /[A-Z]/g;
    if (inputPass.value.match(letterUppercase))
    {
      capital.classList.remove("invalid");
      capital.classList.add("valid");
    }
    else {
      capital.classList.remove("valid");
      capital.classList.add("invalid");
    }
    var num = /[0-9]/g;
    if (inputPass.value.match(num))
    {
      number.classList.remove("invalid");
      number.classList.add("valid");
    }
    else {
      number.classList.remove("valid");
      number.classList.add("invalid");
    }
    if (inputPass.value.length >= 8 )
    {
      length.classList.remove("invalid");
      length.classList.add("valid");
    }
    else {
      length.classList.remove("valid");
      length.classList.add("invalid");
    }
    
  }


var password = document.getElementById("password")
var checkPassword = document.getElementById("password2");

function confirmPassword(){
  if(password.value != checkPassword.value) {
    checkPassword.setCustomValidity("Password do not match");

  } else {

      }
      var popMsg = document.getElementById("email").value;
      //Calling Function to register USer
      register_user();
}

function emailVerify()
{
  
  
  
}

//password.onchange = confirmPassword;
//checkPassword.onkeyup = confirmPassword;
password.onsubmit = confirmPassword;
    </script>
<!--Including JS file and Jquery-->	
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="scripts/script.js"></script>

  </body>
  </html>
