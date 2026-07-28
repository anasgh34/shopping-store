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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        /* CSS المتطابق مع التصميم السابق */
        select, input, textarea, button, .nav-link { appearance: none !important; -webkit-appearance: none !important; -moz-appearance: none !important; }
        .fa-sort, .fa-caret-down, .fa-caret-up { display: none !important; }
        
        .logo { width: 60px; height: 60px; border-radius: 50%; }
        .sidebar { background: #a88a99ff; border-radius: 10px; padding: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .sidebar-title { background: #0dcaf0; color: white; padding: 10px; border-radius: 5px; margin-bottom: 10px; }
        .nav-link { color: #333; transition: 0.3s; }
        .nav-link:hover { color: #0d1cf0ff; padding-left: 15px; }
        .sidebar ul li a { color: #333 !important; display: block; padding: 8px; text-decoration: none; }
        .sidebar ul li a:hover { color: #0dcaf0 !important; }
        /* تنسيق الكروت لتكون احترافية */
.card {
    border: none;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
    border-radius: 15px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.15);
}

.card-img-top {
    height: 400px;
    object-fit: cover; /* لضمان ظهور الصورة بشكل متناسق */
    padding: 20px;
}

.card-body {
    text-align: center;
}

.card-title {
    font-size: 1.1rem;
    font-weight: bold;
    color: #333;
}

.btn-custom {
    background-color: #0dcaf0;
    color: white;
    border-radius: 20px;
    padding: 15px 15px;
    transition: 0.3s;
}
    </style>
</head>
<body>

<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info shadow-sm">
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
                    <input class="form-control me-2" type="search" name="search_data" placeholder="Search...">
                    <input class="btn btn-outline-light" type="submit" value="Search" name="search_data_product">
                </form>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary mb-4">
        <ul class="navbar-nav me-auto px-3">
            <li class="nav-item"><a class="nav-link text-light" href="#">Welcome <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : "Guest"; ?></a></li>
            <li class="nav-item"><a class="nav-link text-light" href="<?php echo !isset($_SESSION['username']) ? './users_area/user_login.php' : './users_area/logout.php'; ?>">
                <?php echo !isset($_SESSION['username']) ? "Login" : "Logout"; ?>
            </a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="text-center mb-5">
            <h3>Shopping Store</h3>
            <p>Welcome to our online store</p>
        </div>

        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <?php 
                        view_details(); 
                        if (isset($_GET['category'])) { get_unique_categories(); }
                        elseif (isset($_GET['brand'])) { get_unique_brands(); }
                    ?>
                </div>
            </div>

            <div class="col-md-2 bg-secondary text-white p-0 sidebar">
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info"><a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a></li>
                    <?php getbrands(); ?>
                </ul>
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info"><a href="#" class="nav-link text-light"><h4>Categories</h4></a></li>
                    <?php getcategories(); ?>
                </ul>
            </div>
        </div>
    </div>

    <?php include("./includes/footer.php"); ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>