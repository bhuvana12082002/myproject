
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
    <title>E commerce website</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">
   
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <!--css file-->
   <link rel="stylesheet" href="style.css">
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
                    <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup><?php
                    cart_item(); ?></sup></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Totalprice: <?php cart_total_price(); ?>/-</a>
                  </li>
                  
                </ul>
                <form class="d-flex" role="search" action="search_product.php" method="get">
                  <input class="form-control me-2" type="search" placeholder="Search" 
                  aria-label="Search" name="search_data">
                  
                  <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
                </form>
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
                <a class="nav-link" href="./user_area/logout.php">Logout</a>
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
   
   <!--fourth child-->
   
    
<!--fetching products-->
<?php
view_details();
cart();
?>




<!--row  end-->
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


