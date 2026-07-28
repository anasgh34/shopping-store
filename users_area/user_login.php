<?php
include('../includes/connect.php');
include('../admin_area/functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login - Shopping Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh; padding: 40px 0; }
        .form-container { 
            background: #ffffff; 
            padding: 40px; 
            border-radius: 20px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.1); 
            border-top: 5px solid #0dcaf0;
        }
        .form-label { font-weight: 600; color: #333; }
        .form-control { border-radius: 10px; padding: 12px; }
        .btn-info { 
            background-color: #0dcaf0; 
            color: white !important; 
            border-radius: 10px; 
            padding: 12px; 
            font-weight: bold; 
            width: 100%;
            transition: 0.3s;
        }
        .btn-info:hover { background-color: #0aadc9; transform: translateY(-2px); }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8">
                <div class="form-container">
                    <h2 class="text-center mb-4">User Login</h2>
                    <form action="" method="post">
                        <div class="mb-4">
                            <label for="user_username" class="form-label">Username</label>
                            <input type="text" id="user_username" class="form-control" placeholder="Enter your username" required name="user_username">
                        </div>
                        <div class="mb-4">
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" id="user_password" class="form-control" placeholder="Enter your password" required name="user_password">
                        </div>
                        
                        <input type="submit" value="Login" class="btn btn-info border-0" name="user_login">
                        
                        <p class="text-center mt-4">Don't have an account? 
                            <a href="user_registration.php" class="text-danger fw-bold text-decoration-none">Register</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

<?php
// منطق الـ PHP الخاص بك يبقى كما هو بالأسفل
if (isset($_POST['user_login'])){

    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "SELECT * FROM user_table WHERE username='$user_username'";
    $result = mysqli_query($con, $select_query);

    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    $user_ip = getIPAddress();

    $select_query_cart = "SELECT * FROM cart_details WHERE ip_address='$user_ip'";
    $select_cart = mysqli_query($con, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);

    if ($row_count > 0) {
        if (password_verify($user_password, $row_data['user_password'])) {
            $_SESSION['user_id'] = $row_data['user_id'];
            $_SESSION['username'] = $user_username;

            echo "<script>alert('Login successful')</script>";

            if ($row_count_cart == 0) {
                echo "<script>window.open('profile.php','_self')</script>";
            } else {
                echo "<script>window.open('payment.php','_self')</script>";
            }
        } else {
            echo "<script>alert('Wrong password')</script>";
        }
    } else {
        echo "<script>alert('Invalid credentials')</script>";
    }
}
?>