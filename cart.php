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
    <title>Shopping Cart - Store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .cart_img { width: 60px; height: 60px; object-fit: contain; }
        .sidebar { background: #faf8f9; border-radius: 10px; padding: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .logo { width: 60px; height: 60px; border-radius: 50%; }
        .nav-link { color: #333; }
        .nav-link:hover { color: #0dcaf0; }
    </style>
</head>
<body>

<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <img src="images/logo.jpg" alt="" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="display_all.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="./users_area/user_registration.php">Register</a></li>
                    <li class="nav-item"><a class="nav-link active" href="cart.php"><i class="fa-solid fa-cart-arrow-down"></i><sup><?php cart_item(); ?></sup></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php cart(); ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto px-3">
            <li class="nav-item"><a class="nav-link text-light" href="#">Welcome <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : "Guest"; ?></a></li>
            <li class="nav-item"><a class="nav-link text-light" href="<?php echo !isset($_SESSION['username']) ? './users_area/user_login.php' : './users_area/logout.php'; ?>"><?php echo !isset($_SESSION['username']) ? "Login" : "Logout"; ?></a></li>
        </ul>
    </nav>

    <div class="bg-light text-center py-3">
        <h3>Shopping Store</h3>
        <p>Your Cart Details</p>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-10">
                <form action="" method="post">
                  <table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Quantity</th>
            <th>Total Price</th> <th>Remove</th>
            <th>Operations</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $get_ip_add = getIPAddress();
        $total_price = 0;
        $cart_query = "select * from `cart_details` where ip_address='$get_ip_add'";
        $result = mysqli_query($con, $cart_query);
        
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                $product_id = $row['product_id'];
                $res_prod = mysqli_query($con, "select * from `products` where product_id='$product_id'");
                while($row_prod = mysqli_fetch_array($res_prod)){
                    $price = $row_prod['product_price'];
                    $quantity = $row['quantity']; // جلب الكمية من جدول السلة
                    $subtotal = $price * $quantity;
                    $total_price += $subtotal;
        ?>
        <tr>
            <td><?php echo $row_prod['product_title']; ?></td>
            <td><img src="./admin_area/product_image/<?php echo $row_prod['product_image1']; ?>" class="cart_img"></td>
            <td><input type="number" name="qty[<?php echo $product_id; ?>]" class="form-control w-50 mx-auto" value="<?php echo $quantity; ?>"></td>
            <td><?php echo $subtotal; ?>$</td> <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id; ?>"></td>
            <td>
                <input type="submit" value="Update" class="btn btn-info btn-sm" name="update_cart">
                <input type="submit" value="Remove" class="btn btn-danger btn-sm" name="remove_cart">
            </td>
        </tr>
        <?php }}} else { echo "<tr><td colspan='6'><h2 class='text-danger'>Cart is empty</h2></td></tr>"; } ?>
    </tbody>
</table>
                  
                   
                    
                    <div class="d-flex mb-5">
                        <?php if(mysqli_num_rows($result) > 0){ ?>
                            <h4 class='px-3'>Subtotal: <strong class='text-info'><?php echo $total_price; ?>$</strong></h4>
                            <input type='submit' value='Continue Shopping' class='btn btn-info mx-3' name='continue_shopping'>
                            <button class='btn btn-secondary'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>
                        <?php } else { ?>
                            <input type='submit' value='Continue Shopping' class='btn btn-info mx-3' name='continue_shopping'>
                        <?php } ?>
                    </div>
                </form>
            </div>

           
        </div>
    </div>

    <?php 
    if(isset($_POST['update_cart'])){
    $quantities = $_POST['qty']; // الآن هذه مصفوفة تحتوي على [product_id => quantity]
    $get_ip_add = getIPAddress();

    foreach($quantities as $product_id => $quantity) {
        // تحديث الكمية في قاعدة البيانات لكل منتج على حدة
        $update_cart = "UPDATE `cart_details` SET quantity=$quantity WHERE ip_address='$get_ip_add' AND product_id=$product_id";
        $run_update = mysqli_query($con, $update_cart);
    }

    // إعادة تحميل الصفحة بعد التحديث
    echo "<script>window.open('cart.php','_self')</script>";
}

    // 2. منطق حذف العناصر
    if(isset($_POST['remove_cart'])){
        if(isset($_POST['removeitem'])){
            foreach($_POST['removeitem'] as $id){
                mysqli_query($con, "DELETE FROM `cart_details` WHERE product_id=$id AND ip_address='".getIPAddress()."'");
            }
            echo "<script>window.open('cart.php','_self')</script>";
        }
    }
   




    include("./includes/footer.php"); 
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>