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
    <title>User Registration form</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">
   
  </head>
<body >
<div class="container mt-3">
<h1 class="text-center">
New User Registration</h1>
<div class="row d-flex align-item-center justify-content-center ">
  <div class="col-lg-12 col-xl-6">
    <form method="POST" action="" enctype="multipart/form-data">
      <!--username-->
      <div class="form-outline mb-4">
      <label for="username" class="form-label">Username</label>
        <input type="text" name="user_name" id="username"
         class="form-control" placeholder="Enter your Username" autocomplete="off"
         required="required">
        </div>
        <!--email-->
        <div class="form-outline mb-4">
        <label for="email" class="form-label">User email id</label>
        <input type="email" name="user_email" id="email"
         class="form-control" placeholder="Enter your email id" autocomplete="off"
         required="required">
        </div>
        
        <!--user image-->
        <div class="form-outline mb-4">
        <label for="image" class="form-label">User Image</label>
        <input type="file" name="user_image" id="email"
         class="form-control"
         required="required">
        </div>
        <!--password-->
        <div class="form-outline mb-4">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="user_password" id="password"
           class="form-control" placeholder="Enter your password" autocomplete="off"
           required="required">
          </div>
  
  
  <!--confirm_password-->
  <div class="form-outline mb-4 ">
  <label for="confirm_password" class="form-label">confirm password</label>
  <input type="password" name="confirm_password" id="confirm_password"
   class="form-control" placeholder="Enter the your confirm Password" autocomplete="off"
   required="required">
  </div>
  <!--user address-->
  <div class="form-outline mb-4">
    <label for="UserAddress" class="form-label">UserAddress</label>
      <input type="text" name="user_address" id="address"
       class="form-control" placeholder="Enter your current address" autocomplete="off"
       required="required">
      </div>

      <!--phone no-->
<div class="form-outline mb-4 ">

  <label for="phone_no" class="form-label">Contact</label>
  <input type="text" name="user_mobile" id="phone_no"
   class="form-control" placeholder="Enter your mobile number" autocomplete="off"
   required="required">

  </div>
   <div class="mt-4 pt-2">
    <input type="submit" name="register" class='btn btn-info mb-3' value="Register">

    <p class=" small fw-bold mt-2 pt-1 mb-0">Already have an account ?
    <a href="user_login.php" class="text-danger"> Login</a></p>
   </div>   
        



      </form>
</div>
</div>
</div>

<!--php code-->
<?php
if(isset($_POST['register']))
{

$user_name=$_POST['user_name'];
$user_email=$_POST['user_email'];
$user_password=$_POST['user_password'];
$confirm_password=$_POST['confirm_password'];
$user_image=$_FILES['user_image']['name'];
$user_image_tmp=$_FILES['user_image']['tmp_name'];
$user_ip=getIPAddress();
$user_address=$_POST['user_address'];
$user_mobile=$_POST['user_mobile'];
$e="";


//select query

$select_query="select * from user_table where user_name='$user_name' or user_email='$user_email'";
$result=mysqli_query($conn,$select_query);
$rows_count=mysqli_num_rows($result);
if($rows_count>0)
{
echo "<script>alert('Username and email  already exits')</script>";
}
else if($user_password!=$confirm_password)
{
echo "<script>alert('password does not match to the confirm passord')</script>";
}
else if(!preg_match("/^\d{10}$/",$user_mobile))
{
echo "<script>alert(' mobile number only  10 digits should be allowed')</script>";
}

else{
//insert query

move_uploaded_file($user_image_tmp,"./user_images/$user_image");

$insert_query="insert into user_table (user_name,user_email,
user_password,user_image,user_ip,user_address,user_mobile)
values ('$user_name','$user_email','$user_password','$user_image',
'$user_ip','$user_address','$user_mobile')";
$result_query=mysqli_query($conn,$insert_query);
if($result_query)
{

echo "<script>alert('successfully registered')</script>";
echo "<script>window.open('../index1.php','_self')</script>";
}

}

//selecting cart items
$select_cart_items="select * from cart_details where ip_address='$user_ip'";
$result_cart==mysqli_query($conn,$select_cart_items);
if($rows_count>0)
{
$_SESSION['username']=$user_name;
echo "<script>alert('You have items in your cart')</script>";
echo "<script>window.open('checkout.php','_self')</script>";
}
else
{
echo "<script>window.open('../index1.php','_self')</script>";
}


}
?>