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
    <title>Shopping Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .logo { width: 50px; height: 50px; border-radius: 50%; }
        .sidebar-box { background: #819abbff; border-radius: 10px; padding: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .sidebar-title { background: #0dcaf0; color: white; padding: 10px; border-radius: 5px; text-align: center; }
        .nav-link { color: #161313ff; transition: 0.3s; }
        .nav-link:hover { color: #0dcaf0; }
          .sidebar ul li a {
    color: #333 !important; /* لون رمادي غامق */
    display: block;
    padding: 8px;
    text-decoration: none;
}
    </style>
</head>
<body>

<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <img src="images/logo.jpg" alt="Logo" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="display_all.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="user_registration.php">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-arrow-down"></i><sup><?php cart_item(); ?></sup></a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Total price: <?php total_cart_price(); ?></a></li>
                </ul>
                <form class="d-flex" action="search_product.php" method="get">
                    <input class="form-control me-2" type="search" name="search_data" placeholder="Search">
                    <input class="btn btn-outline-light" type="submit" value="Search" name="search_data_product">
                </form>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary mb-4">
        <ul class="navbar-nav me-auto px-3">
            <?php
            if(!isset($_SESSION['username'])){
                echo "<li class='nav-item'><a class='nav-link' href='./users_area/user_login.php'>Welcome guest</a></li>";
            } else {
                echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . "</a></li>";
            }
            if(!isset($_SESSION['username'])){
                echo "<li class='nav-item'><a class='nav-link' href='./users_area/user_login.php'>Login</a></li>";
            } else {
                echo "<li class='nav-item'><a class='nav-link' href='./users_area/logout.php'>Logout</a></li>";
            }
            ?>
        </ul>
    </nav>

    <div class="bg-light p-3 mb-4">
        <h3 class="text-center">Shopping Store</h3>
        <p class="text-center">Welcome to Shopping Store</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <?php
                    get_unique_categories();
                    get_unique_brands();
                    get_all_products();
                    ?>
                </div>
            </div>

            <div class="col-md-2 ">
                <div class="sidebar-box">
                    <div class="sidebar-title"><h6>Delivery Brands</h6></div>
                    <ul class="navbar-nav text-center ">
                        <?php getbrands(); ?>
                    </ul>
                    <div class="sidebar-title mt-4"><h6>Categories</h6></div>
                    <ul class="navbar-nav text-center ">
                        <?php getcategories(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php include("./includes/footer.php"); ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>