<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">
    <!--css file-->
    <link rel="stylesheet" href="../style.css">
    <style>
.admin_image
{
  width: 100px;
  height: 100px;
  object-fit: contain;
  box-sizing: border-box;
}
    </style>
</head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0">
        <!--first child-->
    <nav class="navbar navbar-expand-lg navbar-light  bg-info">
        <div class="container-fluid ">
          <img src="../image/logo.png" alt="" class="logo">
          <nav class="navbar navbar-expand-lg">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="" class="nav-link">Welcome Guest</a>
                </li>
            </ul>
        </div>
        </nav>
<!--second child-->
   <div class="bg-light">
    <h3 class="text-center p-2">Manage Details</h3>
</div>
<!--third child-->
<div class="row">
    <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
        <div class="p-3">
          <a href="#"><img src="../image/pinapple.jpeg" alt="" class="admin_image"></a>  
          <p class="text-light text-center">Admin name</p>
        </div>

          <div class="button text-center">
            <!--button*6>a.nav-link.text-light.bg-info.my-1-->
            <button class=" btn btn-outline-info btn-lg me-3"><a href="../index1.php" class="nav-link text-light bg-info my-1">Home</a></button>
            <button class=" btn btn-outline-info btn-lg me-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
            <button class=" btn btn-outline-info btn-lg me-3"><a href="view_product.php" class="nav-link text-light bg-info my-1">View products</a></button>
      
            <button class=" btn btn-outline-info btn-lg me-3"><a href="update_product.php" class="nav-link text-light bg-info my-1">Update products</a></button>
            <button class=" btn btn-outline-info btn-lg me-3"><a href="orders.php" class="nav-link text-light bg-info my-1">All orders</a></button>
            <button class=" btn btn-outline-info btn-lg me-3"><a href="allusers.php" class="nav-link text-light bg-info my-1">List users</a></button>
            <button class=" btn btn-outline-info btn-lg me-3"><a href="admin_logout.php" class="nav-link text-light bg-info my-1">Logout</a></button>
          </div>
        
    </div>
</div>

<!-- last child -->     
<?php
include('../include/footer.php');
?>

</div>


 <!--bootstrap js link-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
 integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
 crossorigin="anonymous">
 </script>


</body>
</html>
