<?php

include('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
    <link href="CGcss.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
  <div class="container mt-3 w-50 m-auto">
    <h1 class="text-center">Insert Products</h1>
    <form action="" method="post" enctype="multipart/form-data">

      <div class="form-outline mb-4">
        <label for="product_title" class="form-label">Product Title</label>
        <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title here" autocomplete="off" required>
      </div>

      <div class="form-outline mb-4">
        <label for="product_description" class="form-label">Product Description</label>
        <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter Product Description here" autocomplete="off" >
      </div>

      <div class="form-outline mb-4">
        <label for="product_Keyword" class="form-label">Product Keyword</label>
        <input type="text" name="product_Keyword" id="product_Keyword" class="form-control" placeholder="Enter Product Keyword here" autocomplete="off" >
      </div>

      <div class="form-outline mb-4">
        <select name="select_category" class="form-select">
          <option value="">Select Categories</option>
          <?php
            $select_query="select * from `categories`";
            $result_query=mysqli_query($con,$select_query);
            while($row=mysqli_fetch_assoc($result_query)){
              $category_title=$row['category_title'];
              $category_id=$row['category_id'];
              echo "<option value='$category_id'>$category_title</option>";
            }
          ?>
          
        </select>
      </div>

      <div class="form-outline mb-4">
        <select name="select_brand" class="form-select">
          <option value="">Select Brands</option>
          <?php
            $select_query="select * from `brands`";
            $result_query=mysqli_query($con,$select_query);
            while($row=mysqli_fetch_assoc($result_query)){
              $brand_title=$row['brand_title'];
              $brand_id=$row['brand_id'];
              echo "<option value='$brand_id'>$brand_title</option>";
            }
          ?>
          
        </select>
      </div>
      <div class="form-outline mb-4">
        <label for="product_image1" class="form-label">Product Image1</label>
        <input type="file" name="product_image1" id="product_image1" class="form-control" >
      </div>

      <div class="form-outline mb-4">
        <label for="product_image2" class="form-label">Product Image2</label>
        <input type="file" name="product_image2" id="product_image2" class="form-control" >
      </div>

      <div class="form-outline mb-4">
        <label for="product_image3" class="form-label">Product Image3</label>
        <input type="file" name="product_image3" id="product_image3" class="form-control" >
      </div>

      <div class="form-outline mb-4">
        <label for="product_Price" class="form-label">Product Price</label>
        <input type="number" name="product_Price" id="product_Price" class="form-control" placeholder="Enter Product Price here" autocomplete="off" required>
      </div>

      <div class="form-outline mb-4">
        <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product">
      </div>
    </form>
  </div>
</body>
</html>
<?php
if(isset($_POST['insert_product'])){
  $product_t=$_POST['product_title'];
  $product_d=$_POST['product_description'];
  $product_k=$_POST['product_Keyword'];
  $select_c=$_POST['select_category'];
  $select_b=$_POST['select_brand'];
  $product_p=$_POST['product_Price'];
  $product_status='true';

  $product_image1=$_FILES['product_image1']['name'];
  $product_image2=$_FILES['product_image2']['name'];
  $product_image3=$_FILES['product_image3']['name'];

  $temp_image1=$_FILES['product_image1']['tmp_name'];
  $temp_image2=$_FILES['product_image2']['tmp_name'];
  $temp_image3=$_FILES['product_image3']['tmp_name'];
  if($product_t=='' or $product_d=='' or $product_k=='' or $select_c=='' or $select_b=='' or $product_image1=='' or $product_image2=='' or $product_image3=='' or $product_p==''){
    echo "<script>alert('Please fill all the available fields')</script>";
    exit();
  }else{
    move_uploaded_file($temp_image1,"./product_images/$product_image1");
    move_uploaded_file($temp_image2,"./product_images/$product_image2");
    move_uploaded_file($temp_image3,"./product_images/$product_image3");

    $insert_products="insert into `products` (product_title,product_desc,product_key,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) values ('$product_t','$product_d','$product_k','$select_c','$select_b','$product_image1','$product_image2','$product_image3','$product_p',NOW(),'$product_status')";
    $result_query=mysqli_query($con,$insert_products);
    if($result_query){
      echo "<script>alert('Successfully inserted the products')</script>";
    }
  }
}
?>