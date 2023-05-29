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
    <title>Payment page</title>
    
</head>
<style>

img
{
width: 100%;

}
</style>

<body>
<!--user id-->
<?php
$user_ip=getIPAddress();
$get_user="select * from user_table where user_ip='$user_ip'";
$result=mysqli_query($conn,$get_user);
$run_query=mysqli_fetch_array($result);
$user_id=$run_query['user_id'];


?>




<div class="container">
<h1 class="text-center text-info">Payment options</h1><br><br>
<div class="row d-flex justify-content-center align-items-center my-5">
<div class="col-md-6">
<a href="https://www.paypal.com" target="_blank"><img src="../image/paytm.png" alt=""></a>
</div>
<div class="col-md-6">
<a href="order.php?user_id=<?php echo $user_id ?>"><h2 class="text-center">Pay Offline</h2></a>
</div>
</div>
</body>
</html>




<!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">
   
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">




