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
    <title> Admin login form</title>
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
Admin login</h1>
<div class="row d-flex align-item-center justify-content-center ">
  <div class="col-lg-12 col-xl-6">
    <form action="" method="POST" enctype="multipart/form-data">
      <!--username-->
      <div class="form-outline mb-4">
      <label for="username" class="form-label">Enter your name</label>
        <input type="text" name="admin_name" id="adminname"
         class="form-control" placeholder="Enter your Name" autocomplete="off"
         required="required">
        </div>
       
        <!--password-->
        <div class="form-outline mb-4">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="admin_password" id="password"
           class="form-control" placeholder="Enter your password" autocomplete="off"
           required="required">
          </div>
  

<!--confirm password-->
        <div class="form-outline mb-4">
          <label for="password" class="form-label">Confirm Password</label>
          <input type="password" name="admin_confirm_password" id="password"
           class="form-control" placeholder="Enter your confirm password" autocomplete="off"
           required="required">
          </div>
  


  <div class="mt-4 pt-2 mb-5">
    <input type="submit" value="login" 
    class="bg-info py-2 px-3 border-0" name="admin_login">
   </div>   
        
  



      </form>





  </div>

</div>
</div>

<?php
if(isset($_POST['admin_login']))
{
$admin_name=$_POST['admin_name'];
$admin_password=$_POST['admin_password'];
$admin_confirm_password=$_POST['admin_confirm_password'];
$select_query="select * from admin_table where admin_name='$admin_name'
 and admin_password='$admin_password' and admin_confirm_password='$admin_confirm_password'";
$result=mysqli_query($conn,$select_query);
$row_count=mysqli_num_rows($result);
            if($row_count>0)
            {
                echo "<script>alert('login successfully')</script>";
                  echo "<script>window.open('index.php','_self')</script>";
            }
            else
            {
                echo "<script>alert('username or password incorrect')</script>";
              
            }

}
?>
</body>
</html>