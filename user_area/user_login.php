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
    <title>User login form</title>
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
User login</h1>
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
       
        <!--password-->
        <div class="form-outline mb-4">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="user_password" id="password"
           class="form-control" placeholder="Enter your password" autocomplete="off"
           required="required">
          </div>
  
  <div class="mt-4 pt-2 mb-5">
    <input type="submit" value="login" 
    class="bg-info py-2 px-3 border-0" name="user_login">
    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ?
      <a href="user_registration.php" class="text-danger"> Register</a></p>
   </div>   
        
  



      </form>





  </div>

</div>
</div>

<?php
if(isset($_POST['user_login']))
{
$user_name=$_POST['user_name'];
$user_password=$_POST['user_password'];
$select_query="select * from user_table where user_name='$user_name'
 and user_password='$user_password'";
$result=mysqli_query($conn,$select_query);
$row_count_cart=mysqli_num_rows($result);
//$user_ip=getIPAddress();

//$select_cart_query="select * from cart_details where ip_address='$user_ip'";
//$select_cart=mysqli_query($conn,$select_cart_query);
$row_count=mysqli_num_rows($result);
            if($row_count>0)
            {
            if($row_count==1 and $row_count_cart==0)
            {
            
                echo "<script>alert('login successfully')</script>";
                  
            }
            else
            {
                 echo "<script>alert('login successfully')</script>";
                  echo "<script>window.open('../index1.php','_self')</script>";

            }
            }
            else
            {
                echo "<script>alert('username or password incorrect')</script>";
              
            }

}
?>
</body>
</html>