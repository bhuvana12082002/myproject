

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

</div>


</div>


 <!--bootstrap js link-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
 integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
 crossorigin="anonymous">
 </script>






<?php
include('../include/connect.php');

//select products

$select_product="select * from user_orders";
$result_query=$conn->query($select_product);

if($result_query)
{
echo "<center><table class='table table-bordered text-center'>
<tr bgcolor='pink' align='center'>
<th>User id</th>
<th>Order amount due</th>
<th>Invoice_number</th>
<th>Total_products</th>
<th>Order date</th>
<th>Order Status</th>

</tr>";
if($result_query->num_rows>0)
while($row=$result_query->fetch_array())
{
echo "<tr align='center'>
   <td>$row[1]</td>
   <td>$row[2]</td>
   <td>$row[3]</td>
   <td>$row[4]</td>
   <td>$row[5]</td>
   <td>$row[6]</td>
   </tr>";
 
}
echo "</table></center>";
 
}

else
echo "cannot execute sql";
$conn->close();

?>
</body>
</html>

