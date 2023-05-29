<?php
include('../include/connect.php');
include('../function/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Billing address</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">
   
  </head>
  <style>
  body{
  overflow-x: hidden;
  }
  </style>
<body >
<div class="container mt-3">
<h1 class="text-center">
User Delivery Details</h1>
<div class="row d-flex align-item-center justify-content-center ">
  <div class="col-lg-12 col-xl-6">
    <form action="" method="POST" enctype="multipart/form-data">
      <!--username-->
      <div class="form-outline mb-4">
      <label for="username" class="form-label">Username</label>
        <input type="text" name="user_name" id="username"
         class="form-control" placeholder="Enter your Username" autocomplete="off"
         required="required">
        </div>
       <!--user emailid-->
          <div class="form-outline mb-4">
        <label for="email" class="form-label">User email id</label>
        <input type="email" name="user_email" id="email"
         class="form-control" placeholder="Enter your email id" autocomplete="off"
         required="required">
        </div>
          <!--user address-->
  <div class="form-outline mb-4">
    <label for="UserAddress" class="form-label">User Delivery Address</label>
      <input type="text" name="user_address" id="address"
       class="form-control" placeholder="Enter your current address" autocomplete="off"
       required="required">
      </div>

      <!--phone no-->
<div class="form-outline mb-4">

  <label for="phone_no" class="form-label">User Contact no</label>
  <input type="text" name="user_mobile" id="phone_no"
   class="form-control" placeholder="Enter your mobile number" autocomplete="off"
   required="required">

  </div>
  
  <div class="mt-4 pt-2 mb-5">
    <input type="submit" value="submit" 
    class="bg-info py-2 px-3 border-0" name="user_bill">
     
  </div>
 </form>

</div>
</div>

<?php
if(isset($_POST['user_bill']))
{
$user_name=$_POST['user_name'];
$user_email=$_POST['user_email'];
$user_address=$_POST['user_address'];
$user_mobile=$_POST['user_mobile'];


//inserting query

$insert_query="insert into user_details (user_name,user_email,user_address,user_mobile)
values ('$user_name','$user_email','$user_address','$user_mobile')";
$result_query=mysqli_query($conn,$insert_query);
if($result_query)
 {
            
         echo "<script>alert('Your billing addres successfull')</script>";
         echo "<script>window.open('../delivery.php','_self')</script>";
 }          

}
?>
</body>
</html>