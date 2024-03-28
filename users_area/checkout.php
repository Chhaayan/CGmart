<?php
include('../includes/connect.php');

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <img src="CG.svg" alt="logo" width="100" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../display_all.php">Products</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="user_registration.php">Register</a>
                </li>
                
                
                <li class="nav-item">
                  <a class="nav-link" href="cart.php">
                    <i class="fa-solid fa-cart-shopping"></i><sup>
                    <?php
                    
                    ?>
                    </sup>
                  </a>
                </li>
                
              </ul>
              
            </div>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
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


<div class="bg-light">
  <h3 class="text-center">CG Mart</h3>
  <p class="text-center">Offers an Array Of Unique Products From Hundreds Of Brands. No Cost EMI Available. Easy & Fast Delivery. Low Prices. Great Offers. Best Deals. Huge Selection.</p>
</div>


<div class="row">
  <div class="col-md-12">
    <!--products-->
    <div class="row">
      <?php
      if(!isset($_SESSION['username'])){
        include('user_login.php');
      }else{
        include('payment.php');
      }
      ?>
  </div>
  </div>
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