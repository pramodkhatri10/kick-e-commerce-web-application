// READ Products From Database 
function read_products() {
    //Ajax Call for reading products from db
    $.get("scripts/read_products.php", {}, function (data, status) {
        //Showing Data in the particular Div
        $(".records_products").html(data);
    });
}

//Filter for sorting Products
function sort_products(sort_by) {
    //Ajax Call for getting products on the basis of sorting from db
    $.post("scripts/sort_products.php", {
        sort_by: sort_by
    }, function (data, status) {
        $(".records_products").html(data);
    });
}

//Function Called on Add to Cart Button Click
function addtocart(id) {
    //getting data
    var d= new Date();
    var m=d.getMonth()+1;
    var today_date = d.getFullYear()+"-"+m+"-"+d.getDate();
    var product_id = id;
    var qty = 1;
    var user_ip = $("#ip").val();
    var size = $("#size"+product_id).val();

    //Ajax Call for to add an item into cart
    $.post("scripts/addtocart.php", {
            product_id:product_id,
            user_ip:user_ip,
            quantity: qty,
            size: size,
            today_date:today_date
            }, function (data, status) {
                location.reload();
    });

}

//Removing Item From Cart
function remove_cart_item(id) {
    //confirmation dilog
    var conf = confirm("Are you sure, do you really want to remove this item from Cart?");
    if (conf == true) {
        //Ajax Call for removing an item form the cart
        $.post("scripts/remove_cart_item.php", {
                id: id
            },
            function (data, status) {
                location.reload();
            }
        );
    }
}

//Empty cart
function empty_cart(user_ip){
    
        $.post("scripts/emptycart.php", {
            ip:user_ip
            },
            function (data, status) {                
            }
        );
    
}

//Function Called on Clicking Checkout Button
function checkout(){
    //getting data
    var user_ip = $("#ip").val();
    var user_name = $("#user_name").val();
    var email = $("#email").val();
    var address = $("#adr").val();
    var city = $("#city").val();
    var state = $("#state").val();
    var zip = $("#zip").val();

    //Ajax Call to Read products from cart
    $.post("scripts/readcart.php", {
        user_ip:user_ip
        },
        function (data, status) {
           
            var product = JSON.parse(data);
           
            var product_name = [product.name];
            var size = [product.size];
            var quantity = [product.quantity];
            var price = [product.price];
            var brand = [product.brand];
            var description = [product.description];
            
            //Storing Multiple Products into arrays
            for(var i=0; i<product.length; i++){
                product_name[i] = product[i].name;
                size[i] = product[i].size;
                quantity[i] = product[i].quantity;
                price[i] = product[i].price;
                brand[i] = product[i].brand;
                description[i] = product[i].description;   
            }
            
            //Ajax Call for Placing an Order
            $.post("scripts/addOrder.php", {
                product_name:product_name,
                size:size,
                quantity: quantity,
                price: price,
                brand: brand,
                description: description,
                user_name: user_name,
                email: email,
                address: address,
                city: city,
                state: state,
                zip: zip,
                user_ip: user_ip
            }, function (data, status) {
                //After Placing order we have to make the cart empty and redirect saying thank you
                empty_cart(user_ip);
                location.replace("thankyou.php");
                              
            }); 
            
        }
    );
}

//User SignUp Function
function register_user() {
    // get values
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var user_name = $("#user_name").val();
    var email = $("#email").val();
    var address = $("#address").val();
    var city = $("#city").val();
    var state = $("#state").val();
    var zip_code = $("#zip_code").val();
    var password = $("#password").val();

//Check user if Email Already Exists in db
$.post("scripts/check_user.php", {
        email: email
    }, function (data, status) {
            //Parse Json Data
            var response = JSON.parse(data);
            var msg = response.message;
        //If Email not Found in Db then Ajax Call for Register user in DB
        if(msg == "Data not found!")
        {
            $.post("scripts/register_user.php", {
            first_name: first_name,
            last_name: last_name,
            user_name: user_name,
            email: email,
            address: address,
            city: city,
            state: state,
            zip_code: zip_code,
            password: password
            }, function (data, status) {
                
            });
            //Alert Message
            alert("Registration Successful, You can now LogIn");
        }
        //If Email alredy Exist in DB Show Message
        else{
            alert("Email Already Exists");
        }
    });

    
}

//-------------------------KICK--------------------------



$(document).ready(function () {
    // READ recods on page load
    read_products(); // calling function
    
//Checks if Enter Key is Pressed then click the hidden button    
$("#search").keypress(function(event) { 
    if (event.keyCode === 13) { 
      $("#search_btn").click(); 
    } 
  }); 

//Search
  $("#search_btn").click(function() { 
    //Get Search Word
    var search_word = $("#search").val();
    //Redirect to Search Page with Parameters containing Search word
    window.location = "search.php?search_word=".concat(search_word);
  }); 

//When Sort Filter Dropdown is changed then call fuction to get sorted products accordingly
  $("#sort").change(function(){
    var sort_by = $(this).val();
    sort_products(sort_by);
  });

});

