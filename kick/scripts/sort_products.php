<?php

	// include Database connection file 
	include("db_connection.php");

    //Get Value Sort By 
    $sort_by = $_POST['sort_by'];

    //If Sort By Ascending then Set Query Accordingly
    if($sort_by == 'price_asc')
    {
        $query = "SELECT * FROM products ORDER BY price asc";
    }
    //Else If Sort By Descending then Set Query Accordingly
    elseif ($sort_by == 'price_desc') {
        $query = "SELECT * FROM products ORDER BY price desc";
    }
    //Else Nothing Selected then simply get Products
    else{
        $query = "SELECT * FROM products";
    }

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
                    <select id="size">
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select> &nbsp;&nbsp;


        		<button> Add to Cart</button>      </div>
    		</div>
  		</div>';
    		
    	}
    }
    else
    {
    	// records not found 
    	$data .= '<tr><td colspan="10">Records not found!</td></tr>';
    }

    echo $data;

?>