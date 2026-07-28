<?php
include('../includes/connect.php');
include('../admin_area/functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration - Shopping Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh; padding: 40px 0; }
        .form-container { 
            background: #ffffff; 
            padding: 40px; 
            border-radius: 20px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.1); 
            border-top: 5px solid #0dcaf0;
        }
        .form-label { font-weight: 600; color: #333; margin-bottom: 8px; }
        .form-control { border-radius: 10px; padding: 12px; border: 1px solid #ddd; }
        .form-control:focus { box-shadow: 0 0 10px rgba(13, 202, 240, 0.2); border-color: #0dcaf0; }
        .btn-info { 
            background-color: #0dcaf0; 
            color: white !important; 
            border-radius: 10px; 
            padding: 12px 25px; 
            font-weight: bold; 
            width: 100%;
            transition: 0.3s;
        }
        .btn-info:hover { background-color: #0aadc9; transform: translateY(-2px); }
        .text-center h2 { color: #333; font-weight: 800; margin-bottom: 30px; }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="form-container">
                    <h2 class="text-center">Create Account</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="user_username" class="form-label">Username</label>
                                <input type="text" id="user_username" class="form-control" placeholder="Enter username" required name="user_username">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="user_email" class="form-label">Email</label>
                                <input type="email" id="user_email" class="form-control" placeholder="Enter email" required name="user_email">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="user_image" class="form-label">Profile Image</label>
                            <input type="file" id="user_image" class="form-control" required name="user_image">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="user_password" class="form-label">Password</label>
                                <input type="password" id="user_password" class="form-control" placeholder="Password" required name="user_password">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="conf_user_password" class="form-label">Confirm Password</label>
                                <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm" required name="conf_user_password">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="user_address" class="form-label">Address</label>
                            <input type="text" id="user_address" class="form-control" placeholder="Your current address" required name="user_address">
                        </div>

                        <div class="mb-4">
                            <label for="user_contact" class="form-label">Contact Number</label>
                            <input type="text" id="user_contact" class="form-control" placeholder="Mobile number" required name="user_contact">
                        </div>
                        
                        <input type="submit" value="Register Now" class="btn btn-info border-0" name="user_register">
                        
                        <p class="text-center mt-4 small">Already have an account? 
                            <a href="user_login.php" class="text-danger fw-bold text-decoration-none">Login here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>

<?php
// (كود الـ PHP الخاص بك هنا لا يتغير)
?>

<?php
if(isset($_POST['user_register'])){
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    $select_query = "SELECT * FROM `user_table` WHERE username='$user_username' OR user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);

    if($rows_count > 0){
        echo "<script>alert('Username or email already exist')</script>";
    } else if($user_password != $conf_user_password) {
        echo "<script>alert('Passwords do not match')</script>";
    } else {
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        $insert_query = "INSERT INTO `user_table` (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) VALUES ('$user_username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";
        $sql_execute = mysqli_query($con, $insert_query);
        
        if($sql_execute){
            $select_cart_items = "SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
            $result_cart = mysqli_query($con, $select_cart_items);
            $rows_count_cart = mysqli_num_rows($result_cart);

            if($rows_count_cart > 0){
                $_SESSION['username'] = $user_username;
                echo "<script>alert('You have items in your cart')</script>";
                echo "<script>window.open('checkout.php','_self')</script>";
            } else {
                echo "<script>window.open('../index.php','_self')</script>"; 
            }
        }
    }
}
?>