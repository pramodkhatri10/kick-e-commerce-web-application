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
        <title>Adidas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="icon" href="images/icon.png">
        <link rel="stylesheet" href="styles/styles.css">
        <link rel="stylesheet" href="styles/product.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
        <script src="https://use.fontawesome.com/c1aff5cbab.js"></script>
    </head>

    <body>
        <!--Store Ip in a hidden field to be used in Javascript-->
        <input type="hidden" name="ip" id="ip" value="<?php echo $ip; ?>">
        <!--Include Header-->
       <?php include('header.php');?>
        <center>
<?php

    // include Database connection file 
    include("scripts/db_connection.php");
    //Get Product ID which is sent as parmeter in link
    $id = $_GET['id'];
    //Query
    $query = "SELECT * FROM products WHERE id = '$id' ";

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

            $data .= '<article class="card">
        <div class="card__right">
        <h2 class="card__name">'.$row['brand'].': '.$row['name'].'</h2>
        <div class="card__price">$'.$row['price'].'</div>
        <p class="card__info">
        '.$row['description'].'  </p>
        <label for="size">Size:</label>
        <select class="size" id="size'.$row['id'].'">
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        </select> &nbsp;&nbsp;
        <a class="btn card__cta" onclick="addtocart('.$row['id'].')">Add to Cart</a> <!--need to link to the CART here!!-->
        </div>
        <div class="card__left"> 
            <div class="card__image">
            <img src="images/'.$row['image'].'" alt="A Modern CSS T-shirt." />
            </div>
        </div>
        </article>';
            
        }
    }
    else
    {
        // records now found 
        $data .= '<tr><td colspan="10">Records not found!</td></tr>';
    }


    echo $data;

?>

         </center>

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
