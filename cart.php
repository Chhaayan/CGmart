<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGMart
    </title>
    <link href="CGcss.css" rel="stylesheet">
    <style>
      .cart-image{
    width: 80px;
    height: 80px;
    object-fit: contain;
    overflow-x:hidden;
    }
      h1,h2,h3,h4,h5,h6{
        overflow: hidden;
      }
      </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
              <img src="CG.svg" alt="logo" width="100" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="display_all.php">Products</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                </li>
                
                
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="fa-solid fa-cart-shopping"></i><sup>
                    <?php
                    cart_item();
                    ?>
                    </sup>
                  </a>
                </li>
                
              </ul>
              
            </div>
            
          </div>
      </nav>
      <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
        <?php
          if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='#'>Welcome Guest</a>
          </li>";
          }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
          </li>";
          }
            
          
          
          if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='./users_area/user_login.php'>Login</a>
          </li>";
          }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='./users_area/logout.php'>Logout</a>
          </li>";
          }
          ?>
        </ul>
      </nav>
  </div> 
<!--calling cart function-->
<?php
cart();
?>

<div class="bg-light">
  <h3 class="text-center">MyCart
  </h3>
  <p class="text-center">Offers an Array Of Unique Products From Hundreds Of Brands. No Cost EMI Available. Easy & Fast Delivery. Low Prices. Great Offers. Best Deals. Huge Selection.</p>
</div>


<div class="container">
  <div class="row">
    <form action="" method="POST">
    <table class="table table-bordered text-center">
      
      <tbody>
      <?php
      
      $get_ip_add=getIPAddress();
      $total_price=0;
      $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
      $result=mysqli_query($con,$cart_query);
      $result_count=mysqli_num_rows($result);
      if($result_count>0){
        echo "<thead>
        <tr>
          <th>Product Title
          </th>
          <th>Product Image
          </th>
          <th>Quantity
          </th>
          <th>Total Price
          </th>
          <th>Remove
          </th>
          <th colspan='2'>Operations
          </th>
        </tr>
      </thead>";
      while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $select_products="select * from `products` where product_id='$product_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
          $product_price=array($row_product_price['product_price']);
          $price_table=$row_product_price['product_price'];
          $product_title=$row_product_price['product_title'];
          $product_image1=$row_product_price['product_image1'];
          $product_values=array_sum($product_price);
          $total_price+=$product_values;
      ?>
        <tr>
          <td><?php echo $product_title ?></td>
          <td><img src="./admin/product_images/<?php echo $product_image1 ?>" class="cart-image" alt="img"></td>
          <td><input type="text" class="form-input w-50" name="qty"></td>
          <?php
          $get_ip_add=getIPAddress();
          if(isset($_POST['update_cart'])){
            $quantities=$_POST['qty'];
            $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
            $result_products_quantity=mysqli_query($con,$update_cart);
            $total_price=$total_price*$quantities;
          }
          ?>
          <td><?php echo $price_table ?></td>
          <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
          <td><!--<button class="bg-info px-3 py-2 border-0 mx-3">Update</button>-->
          <input type="submit" class="bg-info px-3 py-2 border-0 mx-3" value="Update Cart" name="update_cart">
          <!--<button class="bg-info px-3 py-2 border-0 mx-3">Remove</button></td>-->
          <input type="submit" class="bg-info px-3 py-2 border-0 mx-3" value="Remove Cart" name="remove_cart">
        </tr>
        <?php
          }
        }
      }else{
        echo "<h2 class='text-center text-danger'>Cart is Empty</h2>";
      }
        ?>
      </tbody>
    </table>
    <div class="d-flex mb-5">
      <?php
        $get_ip_add=getIPAddress();
        
        $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
        $result=mysqli_query($con,$cart_query);
        $result_count=mysqli_num_rows($result);
        if($result_count>0){
          echo "<h4 class='px-3'>Subtotal:<strong class='text-info'> $total_price/-</strong></h4>
          <input type='submit' value='Continue Shopping' name='continue_shopping' class='bg-info px-3 border-0 mx-3 py-2'></input>
          <a href='users_area/checkout.php'><button class='bg-primary px-3 border-0 py-2 '>Checkout</a></button>";
        }else{
          echo "<input type='submit' value='Continue Shopping' name='continue_shopping' class='bg-info px-3 border-0 mx-3 py-2'></input>";
        }
        if(isset($_POST['continue_shopping'])){
          echo "<script>window.open('index.php','_self')</script>";
        }
      ?>

      
    </div>
  </div>
</div>
</form>

<?php
function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
      echo $remove_id;
      $delete_query="delete from `cart_details` where product_id = $remove_id";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
      }
    }
  }
}
echo $remove_item=remove_cart_item();
?>



  </div>
  <?php
  include('./includes/footer.php');
  ?>

</div>



      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="<KEY>" crossorigin="anonymous">
      </script>
</body>
</html>