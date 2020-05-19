<?php
session_start();
//Check in USer is logged in then show this page otherwise goto login Page
if(!isset($_SESSION['sess_user'])){
    header("Location: login.php"); 
}
else{
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

<style>
.collapsible {
  background-color: #e47070;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 70%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: #b90101;
}

.collapsible:after {
  content: '\002B';
  color: white;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.content {
  padding: 0 18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #f1f1f1;
}
</style>

    </head>

    <body>
        <!--Including Header-->
       <?php include('header.php');?>


        <center>
            <h1>Previous Orders</h1>

<?php

    // include Database connection file 
    include("scripts/db_connection.php");
    //Get USer ID
    $user_id = $_SESSION['sess_user_id'];
    //Query to Get Order 
    $query = "SELECT * FROM orders where user_id = '$user_id' ";

$data = '';
  
    if (!$result = mysqli_query($db,$query)) {
        exit(mysqli_error($db));
    }

    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
        $number = 1;
        $total=0;
        //Fetch Rows of Data
        while($row = mysqli_fetch_assoc($result))
        {

        $data .= '<button class="collapsible">Order ID : '.$row['id'].'</button>
        <div class="content">
            <table style="width:50%">
            <tr>
                <th style="width:70%">Products</th>
                <th style="width:10%">Size</th>
                <th style="width:10%">Quantity</th>
                <th style="width:10%">Price</th>
                
            </tr>';
            //Query to get Order Items
            $query1 = "SELECT * FROM order_items where order_id = '".$row['id']."' ";
            
            if (!$result1 = mysqli_query($db,$query1)) {
                exit(mysqli_error($db));
            }

            // if query results contains rows then featch those rows 
            if(mysqli_num_rows($result1) > 0)
            {
                while($row1 = mysqli_fetch_assoc($result1))
                {
                    //Calculate Total
                $total = $total + $row1['price'];
            $data .= '<tr>
                
                <td><p style="text-align: left;">'.$row1['brand'].': '.$row1['product_name'].'</p></td>
                <td style="text-align: center;">'.$row1['size'].'</td>
                <td style="text-align: center;">'.$row1['quantity'].'</td>
                <td style="text-align: center;">$'.$row1['price'].'</td>
                
            </tr>';
        } }
        $data .= '<tr>
            <td colspan="3"><p style="text-align: right;">Total</p></td>
            <td style="text-align: center;"><b>$'.$total.'</b></td>
                </tr>
             
              
        </table>
        </div> <br>';  
              
  
        }
       
    }
    else
    {
        // records now found 
        $data .= '<tr><td colspan="10">No Previous Orders Found!</td></tr>';
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

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>

    </body>
</html>


<?php } ?>