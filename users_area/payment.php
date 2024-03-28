<?php
include('../includes/connect.php');
include('../functions/common_function.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>payment
  </title>
  <link href="CGcss.css" rel="stylesheet">
  <style>
    body{
      overflow-x:hidden;
    }
    </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
  img{
    width:90%;
    display: block;
    margin: auto;
  }
</style>
<body>
  <?php
  $user_ip=getIPAddress();
  $get_user="select * from `user_table` where user_ip='$user_ip'";
  $result=mysqli_query($con,$get_user);
  $run_query=mysqli_fetch_array($result);
  $user_id=$run_query['user_id'];
  ?>
  <div class="container">
    <h2 class="text-center">Payment Options</h2>
    <div class="row d-flex justify-content-center align-items-center my-5">
      <div class="col-md-6">
      <a href="www.paypal.com" target="_blank"><img src="https://s3.india.com/wp-content/uploads/2022/12/UPI.jpg" alt="UPI"></a>
      </div>
      <div class="col-md-6">
      <a href="order.php?user_id=<?php echo $user_id ?>"><h2 class="text-center">Pay Offline</h2></a>
      </div>
    </div>
  </div>
</body>
</html>