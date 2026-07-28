


<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_category=$_POST['product_category'];
    $product_keywords=$_POST['product_keywords'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status="true";

    

    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];
   

    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];
    if($product_title=='' or $description=='' or $product_keywords=='' or $product_category=='' or $product_brands=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
        echo "<script> alert('Please fill all the available fields ')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1,"./product_image/$product_image1");
        move_uploaded_file($temp_image2,"./product_image/$product_image2");
        move_uploaded_file($temp_image3,"./product_image/$product_image3");
        $insert_products="INSERT INTO products 
(product_title,product_description,product_keywords,
category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status)
VALUES 
('$product_title','$description','$product_keywords',
'$product_category','$product_brands','$product_image1','$product_image2','$product_image3',
'$product_price',NOW(),'$product_status')";
       
         $result_query=mysqli_query($con,$insert_products);
         if($result_query){

           echo "<script> alert('Successfuly inserted the products ')</script>";



    }
 
}
   

}




















?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Insert Product-Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
    
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Product</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title"class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">

            </div>
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="description"class="form-label">Product description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">

            </div>
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords"class="form-label">product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">

            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a Category</option>
                    <?php
                    $select_query="Select * from categories";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                  
                </select>

            </div>
             <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                    <option value="">Select a Brands</option>
                    <?php
                    $select_query="Select * from brands";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $brand_title=$row['brand_title'];
                        $brand_id=$row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>

            </div>
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1"class="form-label">product image1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control"  required="required">
                 
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2"class="form-label">product image2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control"  required="required">
                 
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3"class="form-label">product image3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control"  required="required">
                 
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price"class="form-label">product price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">

            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                
                <input type="submit" name="insert_product"  class="btn btn-info" value="Insert Products">

            </div>

            
           

        </form>
    </div>
    
</body>
</html>