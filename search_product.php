<?php
include('includes/connect.php');
include('./admin_area/functions/common_function.php');
session_start();
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
    <link rel="stylesheet" href="style.css">
    








</head>

<body>
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg  navbar-light bg-info">
  <div class="container-fluid">
    <img  src="images/logo.jpg"  alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-arrow-down"></i><sup><?php cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price : <?php  total_cart_price(); ?></a>
        </li>


























        
      </ul>
      <form class="d-flex"  action="" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
        name="search_data">

        <input class="btn btn-outline-light" type="submit" value="Search" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary ">
  <ul class="navbar-nav me-auto">
   
     <?php
      if(!isset($_SESSION['username'])){
      echo "  <li class='nav-item'>
      <a class='nav-link'   href='./users_area/user_login.php'>welcome guest</a>
    </li>";

    }else{
       echo "  <li class='nav-item'>
      <a class='nav-link'   href='#'>Welcome ". $_SESSION ['username'] ."</a>
    </li>";


    }














    if(!isset($_SESSION['username'])){
      echo "  <li class='nav-item'>
      <a class='nav-link'   href='./users_area/user_login.php'>Login</a>
    </li>";

    }else{
       echo "  <li class='nav-item'>
      <a class='nav-link'   href='./users_area/logout.php'>Logout</a>
    </li>";


    }


?>
  </ul>
</nav>


<div class="bg-light">
<h3 class="text-center">Shopping Store</h3>
<p class="text-center">Welcome to Shopping Store</p>
</div>





         <div class="row px-1">
          <div class="col-md-10">
            <div class="row">
              <?php
              if (isset($_GET['category'])) {
        // إذا ضغط المستخدم على تصنيف معين
        get_unique_categories();
    } 
    elseif (isset($_GET['brand'])) {
        // إذا ضغط المستخدم على ماركة معينة
        get_unique_brands();
    } 
    else {
        // إذا كان المستخدم في الصفحة الرئيسية (لا يوجد category ولا brand في الرابط)
       search_product();
    }

             
             
              ?>
               </div>
                </div>
             
          

    <!-- SIDEBAR -->
   <div class="col-md-2 bg-secondary text-white p-0 sidebar">

    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
      </li>
      <?php
      getbrands();
      
      
      
      
      
      ?>
     
      




    </ul>


   









    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
      </li>
     
       <?php
       getcategories();
       
       
       ?>
      







      




    </ul>

  </div>
</div>






<?php
include("./includes/footer.php")
?>








</div>

<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
  crossorigin="anonymous">
</script>
    
</body>
</html>