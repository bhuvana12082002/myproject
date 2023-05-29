<?php
//include connection file
//include('./include/connect.php');
//getting products
function getproducts()
{

global $conn;
$select_query="select * from `products` order by rand() LIMIT 0,4";
$result_query=mysqli_query($conn,$select_query);
//$row=mysqli_fetch_assoc($result_query);
//echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query))
{
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $product_price=$row['product_price'];
  echo "<div class='col-md-3 mb-2'>
    <div class='card p-2' >
      <img src='./image/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
        <p class='card-text'>price: $product_price/-</p>
        <a href='index1.php?add_to_cart=$product_id'class='btn btn-primary'>Add to cart</a>
        <a href='product_details.php?product_id=$product_id'class='btn btn-secondary'>view more</a>
      </div>
    </div>
    </div>
  ";
  }
}
//getting all products
function get_all_products()
{
    global $conn;
$select_query="select * from `products` order by rand()";
$result_query=mysqli_query($conn,$select_query);
//$row=mysqli_fetch_assoc($result_query);
//echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query))
{
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $product_price=$row['product_price'];
  echo "<div class='col-md-3 mb-2'>
    <div class='card p-2'>
      <img src='./image/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
         <p class='card-text'>price: $product_price/-</p>
        <a href='index1.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
        <a href='product_details.php?product_id=$product_id'class='btn btn-secondary'>view more</a>
      </div>
    </div>
    </div>
  ";
  }
}


//searching product function
function search_product()
{
    global $conn;
    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
$search_query="select * from `products` where product_keywords like '%$search_data_value%'";
$result_query=mysqli_query($conn,$search_query);
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0)
{
echo "<h2 class='text-center text-danger'>No Result match.No Product found on this category!</h2>";
}

while($row=mysqli_fetch_assoc($result_query))
{
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $product_price=$row['product_price'];
  echo "<div class='col-md-3 mb-2'>
    <div class='card p-2'>
      <img src='./image/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
         <p class='card-text'>price: $product_price/-</p>
        <a href='index1.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
        <a href='product_details.php?product_id=$product_id'class='btn btn-secondary'>view more</a>
      </div>
    </div>
    </div>
  ";
  }
}

}

//viewdetails function

function view_details()
{
  global $conn;

if(isset($_GET['product_id'])) 
{
  $product_id=$_GET['product_id'];
$select_query="select * from `products` where product_id=$product_id";
$result_query=mysqli_query($conn,$select_query);
//$row=mysqli_fetch_assoc($result_query);
//echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query))
{
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $product_image2=$row['product_image2'];
  $product_image3=$row['product_image3'];
  $product_price=$row['product_price'];
  echo "
  <div class='row'>
  <div class='col-md-3 mb-2'>
    <div class='card p-2' >
      <img src='./image/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
         <p class='card-text'>price: $product_price/-</p>
        <a href='index1.php?add_to_cart=$product_id'class='btn btn-primary'>Add to cart</a>
        <a href='index1.php'class='btn btn-secondary'>Go home</a>
      </div>
    </div>
    </div>
    

    <div class='col-md-8'>
      <!--releted images-->
      <div class='row'>
      <div class='col-md-10'>
        <h4 class='text-center text-info mb-5'>Related Products</h4>
       </div>
      <div class='col-md-6'>
        <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
      </div>
      
      <div class='col-md-6'>
        <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
      </div>
      </div>
      </div>
      </div>
      
      
  ";
  }
}
}
//getting ip address function 
    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  

//cart function
function cart()
{
if(isset($_GET['add_to_cart']))
{
  global $conn;
  $get_ip_address = getIPAddress(); 
  $get_product_id=$_GET['add_to_cart'];
  $select_query="select * from cart_details where ip_address='$get_ip_address' and 
  product_id=$get_product_id ";
  $result_query=mysqli_query($conn,$select_query);
  $num_of_rows=mysqli_num_rows($result_query);
 if($num_of_rows>0)
{
echo "<script>alert('This item is already present inside cart')</script>";
echo "<script>window.open('index1.php','_self')</script>";
}
else
{
  $insert_query="insert into cart_details (product_id,ip_address,quantity)
  values($get_product_id,'$get_ip_address','0')";
   $result_query=mysqli_query($conn,$insert_query);
   echo "<script>alert('Item is added to the cart')</script>";

   echo "<script>window.open('index1.php','_self')</script>";

}

}
}
//function to get cart item number

function cart_item()
{
  if(isset($_GET['add_to_cart']))
{
  global $conn;
  $get_ip_address = getIPAddress(); 
  $select_query="select * from cart_details where ip_address='$get_ip_address' ";
  $result_query=mysqli_query($conn,$select_query);
  $count_item=mysqli_num_rows($result_query);
}
else
{
  global $conn;
  $get_ip_address = getIPAddress(); 
  $select_query="select * from cart_details where ip_address='$get_ip_address' ";
  $result_query=mysqli_query($conn,$select_query);
  $count_item=mysqli_num_rows($result_query);
}
echo $count_item;
}


//total price function
function cart_total_price(){
global $conn;
$get_ip_address = getIPAddress(); 
$total_price=0;
$cart_query="select * from cart_details where ip_address='$get_ip_address'";
$result_query=mysqli_query($conn,$cart_query);
while($row=mysqli_fetch_array($result_query))
{
$product_id=$row['product_id'];
$select_query="select * from products where product_id='$product_id'";
$result_product=mysqli_query($conn,$select_query);
while($row_product_price=mysqli_fetch_array($result_product)){
$product_price=array($row_product_price['product_price']); //[200,400]
$product_values=array_sum($product_price);  //[600]
$total_price+=$product_values;  //600
}
}
echo $total_price;
}

?>  
