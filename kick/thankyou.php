<?php
session_start();

//Get User IP Address
$_SESSION['sess_user_ip']=$_SERVER['REMOTE_ADDR'];

//If IP is stored in the session then Select order on the basis of IP of USer
if(isset($_SESSION['sess_user_ip']))
{
	$ip = $_SESSION['sess_user_ip'];
	$query = "SELECT max(id) as order_id FROM orders where ip='$ip'";
}
//Else If User ID is stored in the session and its a Login USer then Select order on the basis of IP of USer
else if(isset($_SESSION['sess_user_id']))
{
	$id = $_SESSION['sess_user_id'];
	$query = "SELECT max(id) as order_id FROM orders where user_id='$id'";
}
  // include Database connection file 
  include("scripts/db_connection.php");
  $ip= $_SESSION['sess_user_ip'];

$order_id = 0;
    
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
      	//Get the Order ID
        $order_id = $row['order_id'];
 	
      }
    }
    else
    {
      // records now found 
      $order_id = '0';
    }

?>
<!DOCTYPE html>
<html>
<head>
	<script src="jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
	
	<title></title>

	<style type="text/css">
		/*--thank you pop starts here--*/
.thank-you-pop{
	width:100%;
 	padding:20px;
	text-align:center;
}
.thank-you-pop img{
	width:76px;
	height:auto;
	margin:0 auto;
	display:block;
	margin-bottom:25px;
}

.thank-you-pop h1{
	font-size: 42px;
    margin-bottom: 25px;
	color:#5C5C5C;
}
.thank-you-pop p{
	font-size: 20px;
    margin-bottom: 27px;
 	color:#5C5C5C;
}
.thank-you-pop h3.cupon-pop{
	font-size: 25px;
    margin-bottom: 40px;
	color:#222;
	display:inline-block;
	text-align:center;
	padding:10px 20px;
	border:2px dashed #222;
	clear:both;
	font-weight:normal;
}
.thank-you-pop h3.cupon-pop span{
	color:#03A9F4;
}
.thank-you-pop a{
	display: inline-block;
    margin: 0 auto;
    padding: 9px 20px;
    color: #fff;
    text-transform: uppercase;
    font-size: 14px;
    background-color: #8BC34A;
    border-radius: 17px;
}
.thank-you-pop a i{
	margin-right:5px;
	color:#fff;
}
#ignismyModal .modal-header{
    border:0px;
}
/*--thank you pop ends here--*/
	</style>

</head>
<body>
	
        <div id="ignismyModal"  >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    
                     </div>
					
                    <div class="modal-body">
                       
						<div class="thank-you-pop">
							<img src="images/Green-Round-Tick.png" alt="">
							<h1>Thank You for your Order!</h1>
							<p>Your Order has been Placed Successfully and will be delivered with in 2-3 Working Days.</p>
							<!--Displying ORDER ID HERE-->
							<h3 class="cupon-pop"><span>Order ID: <?php echo $order_id; ?></span></h3>
							<h3><a href="index.php"><span>Goto Home Page </span></a></h3>
							
 						</div>
                         
                    </div>
					
                </div>
            </div>
        </div>

</body>
</html>