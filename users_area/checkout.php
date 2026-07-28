<?php
include('../includes/connect.php');
@session_start();
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
    <link rel="stylesheet" href="style.css">
    <style>
.logo{
  width: 7%;
  height:7%;

}

</style>





</head>

<body>
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg  navbar-light bg-info">
  <div class="container-fluid">
    <img  src="../images/logo.jpg"  alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
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
        
      

























        
      </ul>
      <form class="d-flex"  action="search_product.php" method="get">
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
      <a class='nav-link'   href='./user_login.php'>Login</a>
    </li>";

    }else{
       echo "  <li class='nav-item'>
      <a class='nav-link'   href='logout.php'>Logout</a>
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
                if(!isset($_SESSION['username'])){
                    include('user_login.php');

                }else{
                     include('payment.php');
                }
          ?>
               </div>
                </div>
             
          

    <!-- SIDEBAR -->
  
    <ul class="navbar-nav me-auto text-center">
     
     
      




    </ul>


   









    <ul class="navbar-nav me-auto text-center">
    
    






      




    </ul>

  </div>
</div>






<?php
include("../includes/footer.php")
?>








</div>

<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
  crossorigin="anonymous">
</script>
    
</body>
</html>