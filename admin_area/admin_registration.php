<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
    <style>
        body{
            overflow: hidden;

        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">
            Admin Registration

        </h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/admin.png" alt=" Admin Registration"
                class="img-fluid">

            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">
                            Username
                        </label>
                        <input type="text"id="username" name="username" placeholder=" Enter your username" required="required" class="form-control">

                    </div>
                     <div class="form-outline mb-4">
                        <label for="email" class="form-label">
                           Email
                        </label>
                        <input type="email"id="email" name="email" placeholder=" Enter your email" required="required" class="form-control">

                    </div>
                     <div class="form-outline mb-4">
                        <label for="password" class="form-label">
                          password
                        </label>
                        <input type="password"id="password" name="password" placeholder=" Enter your password" required="required" class="form-control">

                    </div>

                     <div class="form-outline mb-4">
                        <label for="confrim_password" class="form-label">
                         Confrim Password
                        </label>
                        <input type="confrim_password"id="confrim_password" name="confrim_password" placeholder=" Enter your confrim_password" required="required" class="form-control">

                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0"
                        name="admin_registration" value="register">
                        <p class="small fw-bold mt-2 pt-1">D'ont you have an account?
                            <a href="admin_login.php" class="link-danger">Login</a>
                        </p>
                    </div>

                </form>


            </div>

        </div>

    </div>
</body>
</html>