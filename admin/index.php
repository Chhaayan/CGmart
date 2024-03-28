<?php
include('../includes/connect.php');
include('../functions/common_function.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGMart
    </title>
    <link href="CGcss.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>.adminImage{
    width: 100px;
    object-fit: contain;
}
body{
  overflow-x:hidden;
}
.product_img{
  width:100px;
  object-fit:contain;
}</style>
  </head>
<body>
  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <div class="container-fluid">
        <img src="CG.svg" alt="logo" width="100" height="50">
        <nav class="navbar navbar-expand-lg">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="" class="nav-link">Welcome Guest</a>
            </li>
          </ul>
        </nav>
      </div>
    </nav>
    <div class="bg-light">
      <h3 class="text-center p-2">Manage Details</h3>
    </div>
    <div class="row">
      <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
        <div class="p-3">
          <a href=""><img src="../images/profile.jpg" alt="profile" class="adminImage"></a>
          <p class="text-light text-center">Admin Name</p>
        </div>
        <div class="button text-center">
          <button class="my-3"><a href=".\insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
          <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Proucts</a></button>
          <button><a href="index.php?insert_categories" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
          <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
          <button><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
          <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
          <button><a href="" class="nav-link text-light bg-info my-1">All Orders</a></button>
          <button><a href="" class="nav-link text-light bg-info my-1">All Payments</a></button>
          <button><a href="" class="nav-link text-light bg-info my-1">List Users</a></button>
          <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
        </div>
      </div>
    </div>

    <div class="container my-3">
      <?php
      if(isset($_GET['insert_categories'])){
        include('insert_categories.php');
      }
      if(isset($_GET['insert_brands'])){
        include('insert_brands.php');
      }
      if(isset($_GET['view_products'])){
        include('view_products.php');
      }
      if(isset($_GET['edit_products'])){
        include('edit_products.php');
      }
      if(isset($_GET['delete_product'])){
        include('delete_product.php');
      }
      if(isset($_GET['view_categories'])){
        include('view_categories.php');
      }
      if(isset($_GET['view_brands'])){
        include('view_brands.php');
      }
      if(isset($_GET['edit_category'])){ 
        include('edit_category.php');
      }
      if(isset($_GET['edit_brands'])){ 
        include('edit_brands.php');
      }
      if(isset($_GET['delete_category'])){ 
        include('delete_category.php');
      }
      if(isset($_GET['delete_brands'])){ 
        include('delete_brands.php');
      }
      ?>
    </div> 
    <?php
  include('../includes/footer.php');
  ?>



  </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="<KEY>" crossorigin="anonymous">
    </script>
</body>
</html>