<?php
//Start the session
session_start();
ob_start();
?>
<!doctype html>
<html lang="en">
<head>
  <title>KICK</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="icon" href="images/icon.png">
  <link rel="stylesheet" href="styles/styles.css">
  <link rel="stylesheet" href="styles/login.css">
  <script src="scripts/loginvalidation.js"> </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://use.fontawesome.com/c1aff5cbab.js"></script>

</head>
  <body>
<!--Include Header file-->
<?php include('header.php');?>

	<script src="scripts/scripts.js"> </script>
		<div id= "error" ></div>
  
  <div class="container">
    <div class="main">
      <h2><b>Login</b></h2>

      <form id="form_id" method="POST" action="">
        
        <label>User Name :</label>
        <input type="text" name="user_name" id="user_name"/>
    
        <label>Password :</label>
        <input type="password" name="password" id="password"/>
        
        <p id="error" hidden><font color="#FF0000">Invalid Username Or Password </font></p>

        <button type="submit" id="submit" class="submit btn btn-primary" name="submit">
                                    Login
                                </button>
    
      </form> 
    
      <p> Don't Have an Account?</p>

      <a href="signup.php"><input type="button" value="Signup" id="submit"></a>

      <a href="checkout.php?guest=true" style="float: right;">Continue as Guest</a>
    </div>
  </div>
​
<?php
//Check if Form is submitted
if(isset($_POST["submit"])){
//Check if user name and Password is empty
if(!empty($_POST['user_name']) && !empty($_POST['password'])) {
    
    $user=$_POST['user_name'];
    $pass=$_POST['password'];

    //Connection String
    $con=mysqli_connect('localhost','root','') or die(mysqli_error($con));
    // Connect to DB
    mysqli_select_db($con,'kick') or die("cannot select DB");
    //Query Execution to check user name and password matches in the database records
    $query=mysqli_query($con,"SELECT * FROM user WHERE user_name='".$user."' AND password='".$pass."'");
    //If Query has returned data
    if($query){
        //Getting Number of rows returned 
        $numrows=mysqli_num_rows($query);
        if($numrows!=0)
        { 
          //Fetching Rows
            while($row=mysqli_fetch_assoc($query))
            {
                //Store Data to variables
                $dbuserid=$row['user_id'];
                $dbusername=$row['user_name'];
                $dbpassword=$row['password'];
            }

            if($user == $dbusername && $pass == $dbpassword)
            {
              // If user name and Password is matched then set user parameters in the session
                $_SESSION['sess_user_id']=$dbuserid;
                $_SESSION['sess_user']=$user;
                $_SESSION['sess_user_type']=$dbusertype;
                $_SESSION['sess_user_ip']=$_SERVER['REMOTE_ADDR'];
              //After storing data to session Redirect to Checkout page
                header("Location: checkout.php");

                exit();
            }
        } else {
            //Display Error 
            echo "<script type=\"text/javascript\"> document.getElementById(\"error\").style.display = \"block\";</script>";
        }
    }else{
        echo "Unable to login :(";
    }


} else {
    echo "All fields are required!";
}
}
?>



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
​
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
      //stickynav script
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
    
    //login script	
    </script>
<!--Including JS file and Jquery-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="scripts/script.js"></script>

  </body>
</html>
