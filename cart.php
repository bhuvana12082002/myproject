
<?php
include('./include/connect.php');
include('./function/common_function.php');
?>
   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E commerce website-cart details</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">
   
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <!--css file-->
   <link rel="stylesheet" href="style.css">
   <style>
   .cart-image
{
  height: 80px;
  width: 80px;
  object-fit: contain;
}
   </style>
  </head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
      <!--first child-->
        <nav class="navbar navbar-expand-lg navbar-light  bg-info">
            <div class="container-fluid">
              <img src="./image/logo.png" alt="" class="logo">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index1.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="display_all.php">Products</a>
                  </li>
                  
                 
                  <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php
                    cart_item(); ?></sup></a>
                  </li>
                  
                  
                </ul>
               
              </div>
            </div>
          </nav>
            
          <!--second child-->
          <nav class="navbar navbar-expand-lg navbar-dark  bg-secondary">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link" href="#">Welcome Guest</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../logout.php">Logout</a>
              </li>
              
             </ul>
          </nav>
   
   <!--third child--> 
   <div class="bg-light">
    <h3 class="text-center">Virtual Store</h3>
    <p class="class text-center">
      Communication is at the  heart of e-commerce and community
    </p>
   </div> 
   
   
<!--table-->
<div class="container">
<div class="row">
<form action="" method="post">
<table class="table table-bordered text-center">

<!--php code to display cart-->
<?php
global $conn;
$get_ip_address = getIPAddress(); 
$total_price=0;
$cart_query="select * from cart_details where ip_address='$get_ip_address'";
$result_query=mysqli_query($conn,$cart_query);
$result_count=mysqli_num_rows($result_query);
if($result_count>0)
{
echo "<tr>
<th>Product Title</th>
<th>Product Image</th>
<th>Quantity</th>
<th>Total Price</th>
<th>Remove</th>
<th colspan=2>Operations</th>
</tr>";

while($row=mysqli_fetch_array($result_query))
{
$product_id=$row['product_id'];
$select_query="select * from products where product_id='$product_id'";
$result_product=mysqli_query($conn,$select_query);
while($row_product_price=mysqli_fetch_array($result_product)){
$product_price=array($row_product_price['product_price']); 
$product_total_price=$row_product_price['product_price'];
$product_title=$row_product_price['product_title'];
$product_image1=$row_product_price['product_image1'];
$product_values=array_sum($product_price);  
$total_price+=$product_values;  
?>
<tr>
<td><?php echo $product_title ?></td>
<td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="" class="cart-image"></td>
<td><input type="text" name="quantity" class="form-input w-50" ></td>
<?php
$get_ip_address = getIPAddress(); 
if (isset($_POST['update_cart'])){
    $quantities = $_POST['quantity'];
    $update_cart = "update cart_details set quantity=$quantities where ip_address='$get_ip_address'";
    $result_product_qty = mysqli_query($conn, $update_cart);
    $total_price =$total_price*intval($quantities);  
}


?>


<td><?php echo $product_total_price ?>/-</td>
<td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"></td>
<td>
<div class="d-flex">
<input type="submit" name='update_cart' value="update cart"
 class="bg-info px-3 py-3 mx-3 border-light">
<input type="submit" name='remove_cart' value="Remove cart" 
class="bg-info px-3 py-3 mx-3 border-light">

</div>
</td>
</tr>
<?php
}
}
}
else
{
echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
}
?>

</table>


<!--sub total-->
<div class="d-flex mb-5">
<?php
global $conn;
$get_ip_address = getIPAddress(); 
$cart_query="select * from cart_details where ip_address='$get_ip_address'";
$result_query=mysqli_query($conn,$cart_query);
$result_count=mysqli_num_rows($result_query);
if($result_count>0)
{
echo "
<h4 class='px-3'>Subtotal: <strong class='text-info'>
$total_price/-</strong></h4>
<input type='submit' name='continue_shopping' 
value='continue shopping' class='bg-info px-3 py-3 mx-3 border-light'>
<button class='bg-secondary px-3 py-3 mx-3 border-0 '>
<a href='./user_area/payment.php' class='text-light text-decoration-none'>
Check out</button></a>
";
}
else
{
echo"<input type='submit' name='continue_shopping' 
value='continue shopping' class='bg-info px-3 py-3 mx-3 border-light'>";
}
if(isset($_POST['continue_shopping']))
{
echo "<script>window.open('index1.php','_self')</script>";
}

?>
</div>

</form>
<!-- function to remove items-->
<?php
function remove_cart_item()
  {
    global $conn;
    if(isset($_POST['remove_cart']))
    {
      foreach($_POST['removeitem'] as $remove_id )
      {
        echo $remove_id;
        $delete_query="Delete  from cart_details where product_id='$remove_id'";
        $run_delete=mysqli_query($conn,$delete_query);
        if($run_delete)
        {
          echo "<script>window.open('cart.php','_self')</script>";
        }
      }
    }

  }
echo $remove_item=remove_cart_item();


?>

</div>
</div>



<?php
cart();
?>

</div>
</div>

      
        
        

        
          
          
        
<!-- last child -->     
<!--include footer-->
<?php
include('./include/footer.php');
?>  
    
        
       



    <!-- bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
    crossorigin="anonymous">
    </script>    
</body>
</html>


